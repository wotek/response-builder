<?php
/**
 * @package Response
 * @subpackage Factory
 *
 * @author Wojtek Zalewski <wojtek@neverbland.com>
 *
 * @copyright Copyright (c) 2013, Wojtek Zalewski
 * @license MIT
 */

namespace Wtk\Response\Factory;

use Wtk\Response\Serializer\HasSerializerTrait;

/**
 * Serialize Aware Factory
 *
 * @author Wojtek Zalewski <wojtek@neverbland.com>
 */
class SerializerAwareFactory
{
    /**
     * Supports serialize existence.
     */
    use HasSerializerTrait;

    /**
     * Serializer instance
     *
     * @var SerializerInterface
     */
    protected $serializer;
}
