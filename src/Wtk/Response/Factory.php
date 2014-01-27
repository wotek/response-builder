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

use Wtk\Response\FactoryInterface;
use Wtk\Response\Factory\FactoryInterface as ConcreteFactoryInterface;
use Wtk\Response\Prototype\PrototypeInterface;

use MD\Foundation\Utils\ArrayUtils;

/**
 * Response abstract factory.
 *
 * @author Wojtek Zalewski <wojtek@neverbland.com>
 */
class Factory implements FactoryInterface
{
    /**
     * Concrete response factories
     *
     * @var array
     */
    protected $factories = array();

    /**
     * Returns concrete factory for given response type.
     *
     * @param  string  $type
     *
     * @return ConcreteFactoryInterface
     */
    protected function get($type)
    {
        return ArrayUtils::get($this->factories, $type, null);
    }

    /**
     * Registers factory for given response $type.
     *
     * @param  string                   $type
     * @param  ConcreteFactoryInterface $factory
     *
     * @throws RuntimeException
     */
    public function register($type, ConcreteFactoryInterface $factory)
    {
        if (null !== $this->get($type)) {
            throw new \RuntimeException(
                sprintf("Factory for type: %s is already registered.", $type)
            );
        }

        $this->factories[$type] = $factory;
    }

    /**
     * Creates response using concrete factory
     *
     * @param  string               $type
     * @param  PrototypeInterface   $prototype
     *
     * @throws RuntimeException
     *
     * @return ResponseInterface
     */
    public function create($type, PrototypeInterface $prototype = null)
    {
        /**
         * Concrete factory instance.
         *
         * @var ConcreteFactoryInterface
         */
        $factory = $this->get($type);

        if (null === $factory) {
            throw new \RuntimeException(
                sprintf("Factory for type %s not found.", $type)
            );
        }

        /**
         * Create response using given prototype.
         *
         * @var ResponseInterface
         */
        return $factory->create($prototype);
    }

}
