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

use Wtk\Response\Body\Field;

/**
 * Body field test
 *
 * @author Wojtek Zalewski <wojtek@neverbland.com>
 */
class FieldTest extends ResponseTestCase
{

    public function getField($name, $value)
    {
        return new Field($name, $value);
    }

    public function testToArray()
    {
        $field = $this->getField('test', true);

        $array = $field->toArray();

        $this->assertSame(
            array('test' => true),
            $field->toArray()
        );
    }

    public function testSetValue()
    {
        $field = $this->getField('test', true);
        $new_value = false;
        $field->setValue($new_value);
        $this->assertSame($new_value, $field->getValue());
    }

    public function testGetValue()
    {
        $field = $this->getField('test', true);
        $this->assertTrue($field->getValue());
    }

    public function testtoArrayOnObject()
    {
        $mock = $this->getArrayableMockedObject();

        $returnValue = array('value' => true);

        $mock->expects($this->any())
        ->method('toArray')
        ->will($this->returnValue($returnValue))
        ;

        $field = $this->getField('test', $mock);

        $result = $field->toArray();

        $this->assertSame(
            array('test' => $returnValue),
            $field->toArray()
        );
    }
}
