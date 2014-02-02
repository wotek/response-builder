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

namespace Wtk\Response\Tests\Normalizer;

use Wtk\Response\Tests\ResponseTestCase;

use Wtk\Response\Normalizer\FieldsNormalizer;
use Wtk\Response\Body\Fields;
use Wtk\Response\Body\Field;

/**
 * Normalizer tests
 *
 * @author Wojtek Zalewski <wojtek@neverbland.com>
 */
class FieldsNormalizerTest extends ResponseTestCase
{

    public function getNormalizer()
    {
        return new FieldsNormalizer();
    }

    public function getFieldsArray()
    {
        return array(
            'foo' => 1,
            'bar' => 'baz',
            'bat' => array('foo' => true),
            'baz' => true,
        );
    }

    public function getFields()
    {
        $fields = new Fields;

        foreach ($this->getFieldsArray() as $key => $value) {
            $fields->add(new Field($key, $value));
        }

        return $fields;
    }

    public function testEncode()
    {
        $normalizer = $this->getNormalizer();

        $fields = $this->getFields();


        $this->assertSame(
            $this->getFieldsArray(),
            $normalizer->normalize($fields)
        );
    }

    /**
     * @expectedException RuntimeException
     */
    public function testInvalidInput()
    {
        $normalizer = $this->getNormalizer();
        $normalizer->normalize('invalid_input');
    }

}
