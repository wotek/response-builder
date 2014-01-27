<?php
/**
 * @package Response
 * @subpackage Prototype
 *
 * @author Wojtek Zalewski <wojtek@neverbland.com>
 *
 * @copyright Copyright (c) 2013, Wojtek Zalewski
 * @license MIT
 */

namespace Wtk\Response\Prototype;

use Wtk\Response\Header\Fields as HeaderFields;
use Wtk\Response\Body\Fields as BodyFields;

/**
 * Default response prototype.
 *
 * @author Wojtek Zalewski <wojtek@neverbland.com>
 */
class DefaultPrototype implements PrototypeInterface
{

    /**
     * Headers container
     *
     * @var FieldsInterface
     */
    protected $headers;

    /**
     * Body container
     *
     * @var FieldsInterface
     */
    protected $body;

    /**
     *
     */
    public function __construct()
    {
        $this->headers = new HeaderFields();
        $this->body = new BodyFields();
    }

    /**
     * Returns headers container
     *
     * @return FieldsInterface
     */
    public function getHeaders()
    {
        return $this->headers;
    }

    /**
     * Returns body container
     *
     * @return FieldsInterface
     */
    function getBody()
    {
        return $this->body;
    }
}
