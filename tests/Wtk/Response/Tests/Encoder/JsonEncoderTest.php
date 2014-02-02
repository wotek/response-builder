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

namespace Wtk\Response\Tests\Encoder;

use Wtk\Response\Tests\ResponseTestCase;
use Wtk\Response\Encoder\JsonEncoder;

/**
 * JSON Encoder tests
 *
 * @author Wojtek Zalewski <wojtek@neverbland.com>
 */
class JsonEncoderTest extends ResponseTestCase
{

    public function getEncoder()
    {
        return new JsonEncoder();
    }

    public function dataProvider()
    {
        return array(
            array(
                'input' => array(),
                'output' => '[]',
            ),
            array(
                'input' => array('foo' => 1, 'bar' => array('baz' => 2, 'bat' => true)),
                'output' => '{"foo":1,"bar":{"baz":2,"bat":true}}',
            ),
        );
    }

    /**
     * @dataProvider dataProvider
     */
    public function testEncode($input, $output)
    {
        $encoder = $this->getEncoder();

        $this->assertSame($output, $encoder->encode($input));
    }

}
