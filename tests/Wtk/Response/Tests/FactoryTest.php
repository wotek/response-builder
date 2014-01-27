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

namespace Wtk\Response\Tests;

/**
 * Response factory tests
 *
 * @author Wojtek Zalewski <wojtek@neverbland.com>
 */
class FactoryTest extends ResponseTestCase
{

    /**
     * Attempts to create Response with no concrete factories defined.
     *
     * @expectedException RuntimeException
     */
    public function testCreateResponseWIthEmptyFactory()
    {
        $factory = $this->getFactory();

        $factory->create('json');
    }

    /**
     * Attempts to register concrete factory within main one.
     */
    public function testRegisterConcreteFactory()
    {
        $factory = $this->getFactory();

        $concrete_factory = $this->getConcreteFactoryMock(array(
            'create',
        ));

        $prototype_mock = $this->getPrototypeMock();
        $response_mock = $this->getResponseMock();

        $concrete_factory->expects($this->once())
            ->method('create')
            ->with($prototype_mock)
            ->will($this->returnValue($response_mock))
        ;

        /**
         * Lets register out factory
         */
        $factory->register('json', $concrete_factory);
        /**
         * ... and try to build a response object
         */
        $response = $factory->create('json', $prototype_mock);

        $this->assertSame($response_mock, $response);
    }

    /**
     * Attempts to register the same factory twice.
     *
     * @expectedException RuntimeException
     */
    public function testAttemptToRegisterTwoConcreteJsonFactories()
    {
        $factory = $this->getFactory();

        $concrete_factory_one = $this->getConcreteFactoryMock();
        $concrete_factory_two = $this->getConcreteFactoryMock();

        /**
         * Register first factory:
         */
        $factory->register('json', $concrete_factory_one);
        /**
         * Attempt to register under json type again,
         * this should throw exception:
         */
        $factory->register('json', $concrete_factory_two);
    }

}
