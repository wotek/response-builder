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

/**
 * Response class.
 *
 * @author Wojtek Zalewski <wojtek@neverbland.com>
 */
class Response implements ResponseInterface
{

    /**
     * Supports serialize existence.
     */
    use HasSerializerTrait;

    /**
     * Supports serialize existence.
     */
    use HasPrototypeTrait;

    protected $version = '1.0';

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

}
