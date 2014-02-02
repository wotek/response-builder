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

namespace Wtk\Response\Tests\Serializer;

use Wtk\Response\Tests\ResponseTestCase;

use Wtk\Response\Normalizer\FieldsNormalizer;
use Wtk\Response\Encoder\JsonEncoder;
use Wtk\Response\Serializer\Serializer;

use Wtk\Response\Body\Fields;
use Wtk\Response\Body\Field;

/**
 * Serializer tests
 *
 * @author Wojtek Zalewski <wojtek@neverbland.com>
 */
class SerializerTest extends ResponseTestCase
{
    public function getSerializer()
    {
        return new Serializer(
            $this->getNormalizer(),
            $this->getEncoder()
        );
    }

    public function getNormalizer()
    {
        return new FieldsNormalizer();
    }

    public function getEncoder()
    {
        return new JsonEncoder();
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


    public function testSerialize()
    {
        $serializer = $this->getSerializer();
        $serialized = $serializer->serialize($this->getFields());
        $expected = '{"foo":1,"bar":"baz","bat":{"foo":true},"baz":true}';
        $this->assertSame($expected, $serialized);
    }

    public function testSetNormalizer()
    {
        $serializer = $this->getSerializer();

        $normalizer = $this->getNormalizerMock();

        $serializer->setNormalizer($normalizer);

        $this->assertSame(
            $normalizer,
            $serializer->getNormalizer()
        );
    }

    public function testSetEncoder()
    {
        $serializer = $this->getSerializer();

        $encoder = $this->getEncoderMock();

        $serializer->setEncoder($encoder);

        $this->assertSame(
            $encoder,
            $serializer->getEncoder()
        );
    }

}
