<?php
/**
 * @package Response
 *
 * @author Wojtek Zalewski <wojtek@neverbland.com>
 *
 * @copyright Copyright (c) 2013, Wojtek Zalewski
 * @license MIT
 */

namespace Wtk;

use Wtk\Response\ResponseInterface;

use Wtk\Response\Prototype\PrototypeInterface;
use Wtk\Response\Prototype\HasPrototypeTrait;

use Wtk\Response\Serializer\SerializerInterface;
use Wtk\Response\Serializer\HasSerializerTrait;

use Wtk\Response\Http\ResponseTrait as IsHttpResponse;

/**
 * Response class.
 *
 * @author Wojtek Zalewski <wojtek@neverbland.com>
 */
class Response implements ResponseInterface
{

    /**
     * Trait with HTTP specific properties
     */
    use IsHttpResponse;

    /**
     * Supports serialize existence.
     */
    use HasSerializerTrait;

    /**
     * Supports prototype existence.
     */
    use HasPrototypeTrait;

    /**
     * Return HTTP protocol version.
     *
     * @var string
     */
    protected $version = '1.0';

    /**
     * HTTP Response status.
     *
     * @var int
     */
    protected $status = 200;

    /**
     * Response headers
     *
     * @var array
     */
    protected $headers;

    /**
     * Response content
     *
     * @var string
     */
    protected $content;

    /**
     * Response status text
     *
     * @var string
     */
    protected $status_text;

    /**
     * Serializer instance
     *
     * @var SerializerInterface
     */
    protected $serializer;

    /**
     * Does response has serializer.
     *
     * @return boolean
     */
    protected function hasSerializer()
    {
        return null !== $this->serializer;
    }

    /**
     * Does response has prototype.
     *
     * @return boolean
     */
    protected function hasPrototype()
    {
        return null !== $this->prototype;
    }

    /**
     * Sets response content
     *
     * @param  string     $content
     *
     * @return void
     */
    public function setContent($content)
    {
        if(true === $this->hasPrototype()) {
            /**
             * This will override previously set body elements.
             * If you want to set specific field use getPrototype
             * method to access Body Fields container.
             */
            $this->getPrototype()->getBody()->setContent($content);
        }

        if (null !== $content 
            && !is_string($content) 
            && !is_numeric($content) 
            && !is_callable(array($content, '__toString'))
        ) {
            throw new \UnexpectedValueException(
                sprintf(
                    'The Response content must be a string or object implementing __toString(), "%s" given.',
                     gettype($content)
                )
            );
        }

        /**
         * Set plain content value
         *
         * @var mixed
         */
        $this->content = (string) $content;
    }

    /**
     * Returns response body content.
     *
     * @return string
     */
    public function getContent()
    {
        if(true === $this->hasPrototype()) {
            return $this->getPrototype()->getBody();
        }

        return $this->content;
    }

    /**
     * Returns response headers container.
     *
     * @return FieldsInterface
     */
    public function getHeaders()
    {
        if(true === $this->hasPrototype()) {
            return $this->getPrototype()->getHeaders();
        }

        return $this->getHeaders();
    }

    /**
     * Prepares response headers and body.
     *
     * @return array
     */
    protected function prepare()
    {
        $body = $this->getContent();

        if(true === $this->hasSerializer()) {
            $body = $this->getSerializer()->serialize($body);
        }

        /**
         * @todo: We should have it like:
         * $this->getHeaders()->prepare();
         *
         * There are some parts of headers which need to be
         * set depending on body. Like content-length etc.
         *
         * @see https://github.com/symfony/symfony/blob/master/src/Symfony/Component/HttpFoundation/Response.php#L267
         *
         * for common fixes and problems here.
         */
        $headers = $this->getHeaders();

        return array($headers, $body);
    }

    /**
     * Returns the Response as an HTTP string.
     *
     * @return string The Response as an HTTP string
     */
    public function __toString()
    {
        /**
         * 1. HTTP/Version Code Message
         * 2. Headers
         * 3. Body
         */
        list($headers, $body) = $this->prepare();

        return
            sprintf(
                'HTTP/%s %s %s',
                $this->getProtocolVersion(),
                $this->getStatus(),
                $this->getStatusText()
            )
            . "\r\n"
            . $headers
            . "\r\n"
            . $body
        ;
    }

}
