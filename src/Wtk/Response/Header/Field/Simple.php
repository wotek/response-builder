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
class Simple implements FieldInterface
{
    /**
     * Field name
     *
     * @var string
     */
    protected $name;

    /**
     * Field value
     *
     * @var mixed
     */
    protected $value;

    public function __construct($name, $value)
    {
        $this->name = $name;
        $this->value = $value;
    }

    /**
     * Returns field name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    public function getValue()
    {
        /**
         * @todo: is is object, than it has to implement toString method
         */
        return $this->value;
    }

    function __toString()
    {
        /**
         * @todo: Parse it to fit http specific format
         */
        return $this->name .' : ' . $this->value;
    }
}
