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
 * Basic implementation - simple Value Object for Header elements
 *
 * @author Wojtek Zalewski <wojtek@neverbland.com>
 */
abstract class AbstractField
{

    /**
     * Stringify object
     *
     * @return string
     */
    public function stringify()
    {
        /**
         * @todo: Parse it to fit http specific format
         */
        return $this->name .': ' . $this->value;
    }

    /**
     * Stringify object
     *
     * @return string
     */
    public function __toString()
    {
        /**
         * @todo: Re-route to Utils/Stringify
         */
        return $this->stringify();
    }

    /**
     * Return field as an array
     *
     * @return array
     */
    public function toArray()
    {
        /**
         * Consider format:
         * array (
         *  'name' => $name,
         *  'value' => $value,
         * )
         *
         * @var array
         */
        return array(
            $this->name => $this->value,
        );
    }

}
