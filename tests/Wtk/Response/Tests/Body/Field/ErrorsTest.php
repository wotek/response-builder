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

use Wtk\Response\Body\Field\Errors;

/**
 * Body field test
 *
 * @author Wojtek Zalewski <wojtek@neverbland.com>
 */
class ErrorsTest extends ResponseTestCase
{

    public function testField()
    {
        $errors = array('field' => 'validation error');

        $field = new Errors($errors);

        $this->assertSame($errors, $field->getValue());
        $this->assertSame('errors', $field->getName());
    }
}
