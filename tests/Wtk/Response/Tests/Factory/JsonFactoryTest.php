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

namespace Wtk\Response\Tests\Factory;

use Wtk\Response\Factory\JsonFactory;
use Wtk\Response\Tests\ResponseTestCase;

/**
 * Json factory tests
 *
 * @author Wojtek Zalewski <wojtek@neverbland.com>
 */
class JsonFactoryTest extends ResponseTestCase
{
    /**
     * Returns tested factory.
     */
    public function getFactory()
    {
        return new JsonFactory();
    }

    /**
     * Test factory inheritance.
     */
    public function testInheritance()
    {
        $factory = $this->getFactory();

        $this->assertInstanceOf(
            '\Wtk\Response\Factory\FactoryInterface',
            $factory
        );
    }

    /**
     * Create response with serializer and prototype given.
     */
    public function testCreateResponseWithSerializerAndPrototype()
    {
        $serializer_mock = $this->getSerializerMock();
        $prototype_mock = $this->getPrototypeMock();

        $factory = $this->getFactory();

        $factory->setSerializer($serializer_mock);

        $response = $factory->create($prototype_mock);

        $this->assertSame($serializer_mock, $response->getSerializer());
        $this->assertSame($prototype_mock, $response->getPrototype());
    }

    /**
     * Create response without serializer and prototype given.
     */
    public function testCreateResponseWithoutSerializerAndPrototype()
    {
        $factory = $this->getFactory();

        $response = $factory->create();

        $this->assertEmpty($response->getSerializer());
        $this->assertEmpty($response->getPrototype());
    }
}
