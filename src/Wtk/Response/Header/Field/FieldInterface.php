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

    /**
     * Returns field name
     *
     * @return string
     */
    function getName();

    /**
     * Returns header field value
     *
     * @return string
     */
    function getValue();

    /**
     * Returns as string
     *
     * @return string
     */
    function __toString();

    /**
     * Return field as an array
     *
     * @return array
     */
    function toArray();

}
