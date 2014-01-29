<?php
/**
 * @package Response
 * @subpackage Body
 *
 * @author Wojtek Zalewski <wojtek@neverbland.com>
 *
 * @copyright Copyright (c) 2013, Wojtek Zalewski
 * @license MIT
 */

namespace Wtk\Response\Body\Field;

/**
 * Message field interface
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
     * Sets field value
     *
     * @param  mixed     $value
     */
    function setValue($value);

    /**
     * Returns field value
     *
     * @return mixed
     */
    function getValue();

    /**
     * Returns as an array
     *
     * @return array
     */
    function toArray();

}
