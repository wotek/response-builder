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

use Wtk\Response\Serializer\SerializerInterface;

/**
 * Serializer trait
 *
 * @author Wojtek Zalewski <wojtek@neverbland.com>
 */
trait HasSerializerTrait
{

    /**
     * Serializer instance.
     *
     * @var SerializerInterface
     */
    protected $serializer;

    /**
     * Set serializer instance.
     *
     * @param  SerializerInterface $serializer
     */
    public function setSerializer(SerializerInterface $serializer = null)
    {
        $this->serializer = $serializer;
    }

    /**
     * Returns serializer instance.
     *
     * @return SerializerInterface
     */
    public function getSerializer()
    {
        return $this->serializer;
    }

}
