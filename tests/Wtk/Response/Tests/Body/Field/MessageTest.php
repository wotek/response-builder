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

use Wtk\Response\Body\Field\Message;

/**
 * Body field test
 *
 * @author Wojtek Zalewski <wojtek@neverbland.com>
 */
class MessageTest extends ResponseTestCase
{

    public function testField()
    {
        $field = new Message('foo bar');

        $this->assertSame('foo bar', $field->getValue());
        $this->assertSame('message', $field->getName());
    }
}
