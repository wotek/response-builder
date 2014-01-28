<?php
/**
 * @package Response
 * @subpackage Http
 *
 * @author Wojtek Zalewski <wojtek@neverbland.com>
 *
 * @copyright Copyright (c) 2013, Wojtek Zalewski
 * @license MIT
 */

namespace Wtk\Response\Http;

use Wtk\Response\Header\Fields as HeaderFields;

/**
 * HTTP specific response parts
 *
 * @author Wojtek Zalewski <wojtek@neverbland.com>
 */
trait ResponseTrait
{

    /**
     * Sets HTTP Response status.
     *
     * @param  int     $status
     *
     * @return void
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * Returns status.
     *
     * @return int
     *
     * @return void
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Sets HTTP protocol version.
     *
     * @param  string     $version
     *
     * @return void
     */
    public function setProtocolVersion($version)
    {
        $this->version = $version;
    }

    /**
     * Returns HTTP protocol version.
     *
     * @return string
     *
     * @return void
     */
    public function getProtocolVersion()
    {
        return $this->version;
    }

    /**
     * Sets status text.
     *
     * @param  string     $text
     *
     * @return void
     */
    public function setStatusText($text)
    {
        $this->status_text = $text;
    }

    /**
     * Returns response status text
     *
     * @return string
     */
    public function getStatusText()
    {
        return $this->status_text;
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
        $this->content = $content;
    }

    /**
     * Returns response content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Returns headers container
     *
     * @return FieldsInterface
     */
    public function getHeaders()
    {
        /**
         * Lazy. Don't want to pollute
         * Response constructor.
         *
         * Lets leave to developer.
         */
        if(null === $this->headers) {
            $this->headers = new HeaderFields();
        }

        return $this->headers;
    }

}
