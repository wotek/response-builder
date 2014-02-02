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

use Wtk\Response\Body\Field\Code;

/**
 * Body field test
 *
 * @author Wojtek Zalewski <wojtek@neverbland.com>
 */
class CodeTest extends ResponseTestCase
{

    public function testField()
    {
        $field = new Code(200);

        $this->assertSame(200, $field->getValue());
        $this->assertSame('code', $field->getName());
    }
}
