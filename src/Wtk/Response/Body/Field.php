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

namespace Wtk\Response\Body;

use Wtk\Response\Body\Field\FieldInterface;

/**
 * Simple field
 *
 * @author Wojtek Zalewski <wojtek@neverbland.com>
 */
class Field implements FieldInterface
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

    /**
     * Returns field value
     *
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Sets field value
     *
     * @param  mixed     $value
     */
    public function setValue($value)
    {
        // @todo: Check what value is set, validate it.
        $this->value = $value;
    }

    /**
     * Returns as an array
     *
     * @return array
     */
    public function toArray()
    {
        $value = $this->value;

        if(is_object($value)) {
            $value = $value->toArray();
        }

        return array(
            $this->name => $value,
        );
    }

}
