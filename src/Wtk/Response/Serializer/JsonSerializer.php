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
 * Really basic JSON serializer.
 *
 * @author Wojtek Zalewski <wojtek@neverbland.com>
 */
class JsonSerializer implements SerializerInterface
{

    /**
     * Serialize to JSON given input
     *
     * @param  JsonSerializable  $input
     *
     * @return string
     */
    function serialize(\JsonSerializable $input)
    {
        var_dump($input);die;
        return json_encode($input);
    }

}
