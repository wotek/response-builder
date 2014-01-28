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
     * Supports serialize existence.
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

        /**
         * To be considered.
         * (Don't really like it, but. Fail fast ain't that bad)
         *
         * @todo: We can check for content value. Whether it can be outputted
         * as string.
         */

        /**
         * Set plain content value
         *
         * @var mixed
         */
        $this->content = $content;
    }

    /**
     * Returns response body content.
     *
     * @return string
     */
    public function getContent()
    {
        if(true === $this->hasSerializer()) {
            return $this->getSerializer()->serialize($this->content);
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
        return
            sprintf(
                'HTTP/%s %s %s',
                $this->getProtocolVersion(),
                $this->getStatus(),
                $this->getStatusText()
            )
            . "\r\n"
            . $this->getHeaders()
            . "\r\n"
            . $this->getContent()
        ;
    }

}
