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

namespace Wtk\Response\Tests\Prototpye;

use Wtk\Response\Prototype\DefaultPrototype;
use Wtk\Response\Tests\ResponseTestCase;

/**
 * Default response prototype tests
 *
 * @author Wojtek Zalewski <wojtek@neverbland.com>
 */
class DefaultPrototypeTest extends ResponseTestCase
{
    /**
     * Returns tested prototype.
     */
    public function getPrototype()
    {
        return new DefaultPrototype();
    }

    public function testInheritance()
    {
        $this->assertInstanceOf(
            '\Wtk\Response\Prototype\PrototypeInterface',
            $this->getPrototype()
        );
    }

    public function testGetHeadersContainer()
    {
        $this->assertInstanceOf(
            '\Wtk\Response\Header\FieldsInterface',
            $this->getPrototype()->getHeaders()
        );
    }

    public function testGetBodyContainer()
    {
        $this->assertInstanceOf(
            '\Wtk\Response\Body\FieldsInterface',
            $this->getPrototype()->getBody()
        );
    }
}
