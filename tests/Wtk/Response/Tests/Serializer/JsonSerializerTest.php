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

use Wtk\Response\Serializer\JsonSerializer;
use Wtk\Response\Tests\ResponseTestCase;

/**
 * Json serializer tests
 *
 * @author Wojtek Zalewski <wojtek@neverbland.com>
 */
class JsonSerializerTest extends ResponseTestCase
{
    /**
     * Returns tested factory.
     */
    public function getSerializer()
    {
        return new JsonSerializer();
    }

    public function dataProvider()
    {
        return array(
            array(
                'input' => array(),
                'expected' =>'[]',
            ),
            array(
                'input' => null,
                'expected' =>'null',
            ),
            array(
                'input' => new \stdClass(),
                'expected' =>'{}',
            ),
            // more to come...
        );
    }

    /**
     * @dataProvider dataProvider
     */
    public function testSerializer($input, $expected)
    {
        $serializer = $this->getSerializer();
        $this->assertSame($expected, $serializer->serialize($input));
    }

}
