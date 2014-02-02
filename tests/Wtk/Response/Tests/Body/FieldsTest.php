<?php
/**
 * @package Response
 * @subpackage Tests
 *
 * @author Wojtek Zalewski <wojtek@neverbland.com>
 *
 * @copyright Copyright (c) 2013, Wojtek Zalewski
 * @license MIT
 */

namespace Wtk\Response\Tests\Body;

use Wtk\Response\Tests\ResponseTestCase;
use Wtk\Response\Body\Fields;
use Wtk\Response\Body\Field;

/**
 * Body fields container tests
 *
 * @author Wojtek Zalewski <wojtek@neverbland.com>
 */
class FieldsTest extends ResponseTestCase
{

    public function getFields()
    {
        return new Fields;
    }

    public function getField($name, $value)
    {
        return new Field($name, $value);
    }

    public function testAddField()
    {
        $fields = $this->getFields();
        $field = $this->getField('test', 1);

        $fields->add($field);

        $this->assertSame($field, $fields->get('test'));
    }

    public function testToArray()
    {
        $fields = $this->getFields();
        $field = $this->getField('test', 1);

        $fields->add($field);

        $expected = array('test' => $field);

        $this->assertSame($expected, $fields->toArray());
    }

    public function testGetIterator()
    {
        $this->assertInstanceOf(
            'ArrayIterator',
            $this->getFields()->getIterator()
        );
    }

}
