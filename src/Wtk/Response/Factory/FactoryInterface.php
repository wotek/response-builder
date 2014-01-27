<?php
/**
 * @package Response
 *
 * @author Wojtek Zalewski <wojtek@neverbland.com>
 *
 * @copyright Copyright (c) 2013, Wojtek Zalewski
 * @license MIT
 */

namespace Wtk\Response\Factory;

use Wtk\Response\Prototype\PrototypeInterface;

/**
 * Response concrete factory interface.
 *
 * @author Wojtek Zalewski <wojtek@neverbland.com>
 */
interface FactoryInterface
{
    /**
     * Creates response
     *
     * @param  PrototypeInterface   $prototype
     *
     * @return ResponseInterface
     */
    function create(PrototypeInterface $prototype = null);
}
