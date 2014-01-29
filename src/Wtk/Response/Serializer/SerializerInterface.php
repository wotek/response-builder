<?php
/**
 * @package Response
 * @subpackage Serializer
 *
 * @author Wojtek Zalewski <wojtek@neverbland.com>
 *
 * @copyright Copyright (c) 2013, Wojtek Zalewski
 * @license MIT
 */

namespace Wtk\Response\Serializer;

/**
 * Serializer interface
 *
 * @author Wojtek Zalewski <wojtek@neverbland.com>
 */
interface SerializerInterface
{

    /**
     * Serialize given input
     *
     * @param  JsonSerializable  $input
     *
     * @return string
     */
    function serialize(\JsonSerializable $input);

}
