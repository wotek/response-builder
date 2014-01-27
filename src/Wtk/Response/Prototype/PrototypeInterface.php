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

/**
 * Response prototype interface.
 *
 * @author Wojtek Zalewski <wojtek@neverbland.com>
 */
interface PrototypeInterface
{
    function getHeaders();
    function getBody();
}
