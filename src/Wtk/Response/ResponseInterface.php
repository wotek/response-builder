<?php
/**
 * @package Response
 *
 * @author Wojtek Zalewski <wojtek@neverbland.com>
 *
 * @copyright Copyright (c) 2013, Wojtek Zalewski
 * @license MIT
 */

namespace Wtk\Response;

use Wtk\Response\Prototype\PrototypeInterface;
use Wtk\Response\Serializer\SerializerInterface;

/**
 * Response interface.
 *
 * @author Wojtek Zalewski <wojtek@neverbland.com>
 */
interface ResponseInterface
{
    /**
     * Set response prototype
     *
     * @param  PrototypeInterface $prototype
     *
     * @return void
     */
    function setPrototype(PrototypeInterface $prototype = null);

    /**
     * Set response serializer
     *
     * @param  SerializerInterface $serializer
     *
     * @return void
     */
    function setSerializer(SerializerInterface $serializer = null);
}
