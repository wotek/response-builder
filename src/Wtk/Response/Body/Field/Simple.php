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
 * Simple field
 *
 * @author Wojtek Zalewski <wojtek@neverbland.com>
 */
class Simple implements FieldInterface
// implements SerializableToArrayInterface
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

    /**
     *
     * @param  string     $name
     * @param  mixed      $value
     */
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
         * @todo: if is is object, than it has to implement toString method
         */
        return $this->value;
    }

    /**
     * Returns as an array
     *
     * @return array
     */
    public function toArray()
    {
        return array(
            $this->name => $this->value,
        );
    }

}
