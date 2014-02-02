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

use Wtk\Response\Header\Field\AbstractField;
use Wtk\Response\Header\Field\FieldInterface;

/**
 * Basic implementation - simple Value Object for Header elements
 *
 * @author Wojtek Zalewski <wojtek@neverbland.com>
 */
class Field extends AbstractField implements FieldInterface
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

        /**
         * @todo: is is object, than it has to
         * implement toString method
         * We have to check for it now.
         */
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
     * Returns header field value
     *
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

}
