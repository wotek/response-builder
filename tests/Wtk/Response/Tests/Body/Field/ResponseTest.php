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

namespace Wtk\Response\Tests\Body\Field;

use Wtk\Response\Tests\ResponseTestCase;

use Wtk\Response\Body\Field\Response;

/**
 * Body field test
 *
 * @author Wojtek Zalewski <wojtek@neverbland.com>
 */
class ResponseTest extends ResponseTestCase
{

    public function testField()
    {
        $field = new Response('foo bar');

        $this->assertSame('foo bar', $field->getValue());
        $this->assertSame('response', $field->getName());

        $value = array(array(array(true)));

        $field->setValue($value);
        $this->assertSame($value, $field->getValue());
    }
}
