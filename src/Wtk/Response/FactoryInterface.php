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

/**
 * Response abstract factory interface.
 *
 * @author Wojtek Zalewski <wojtek@neverbland.com>
 */
interface FactoryInterface
{
    /**
     * Creates response using concrete factory
     *
     * @param  string               $type
     * @param  PrototypeInterface   $prototype
     *
     * @return ResponseInterface
     */
    function create($type, PrototypeInterface $prototype = null);

    /**
     * Registers factory for given response $type
     *
     * @param  string           $type
     * @param  FactoryInterface $factory
     *
     * @throws RuntimeException
     *
     * @return void
     */
    function register($type, FactoryInterface $factory);
}
