<?php
/**
 * @package Response
 * @subpackage Header
 *
 * @author Wojtek Zalewski <wojtek@neverbland.com>
 *
 * @copyright Copyright (c) 2013, Wojtek Zalewski
 * @license MIT
 */

namespace Wtk\Response\Header\Field;

/**
 * Header field interface
 *
 * @author Wojtek Zalewski <wojtek@neverbland.com>
 */
interface FieldInterface
{
    function getName();
    function getValue();
    function __toString();
}
