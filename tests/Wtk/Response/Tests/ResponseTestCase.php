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

use Wtk\Response\Factory;

/**
 * Response factory tests
 *
 * @author Wojtek Zalewski <wojtek@neverbland.com>
 */
class ResponseTestCase extends \PHPUnit_Framework_TestCase
{

    /**
     * Returns tested factory.
     */
    public function getFactory()
    {
        return new Factory();
    }

    /**
     * Returns mock for concrete factory interface.
     */
    public function getConcreteFactoryMock(array $methods = array())
    {
        return $this->getMockBuilder(
                        '\Wtk\Response\Factory\FactoryInterface'
                    )
                    ->setMethods($methods)
                    ->getMock()
        ;
    }

    /**
     * Return mock for response interface.
     */
    public function getResponseMock(array $methods = array())
    {
        return $this->getMockBuilder(
                        '\Wtk\Response\ResponseInterface'
                    )
                    ->setMethods($methods)
                    ->getMock()
        ;
    }

    /**
     * Return mock for response interface.
     */
    public function getPrototypeMock(array $methods = array())
    {
        return $this->getMockBuilder(
                        '\Wtk\Response\Prototype\PrototypeInterface'
                    )
                    ->setMethods($methods)
                    ->getMock()
        ;
    }

    public function getNormalizerMock(array $methods = array())
    {
        return $this->getMockBuilder(
                        '\Wtk\Response\Normalizer\NormalizerInterface'
                    )
                    ->setMethods($methods)
                    ->getMock()
        ;
    }

    public function getEncoderMock(array $methods = array())
    {
        return $this->getMockBuilder(
                        '\Wtk\Response\Encoder\EncoderInterface'
                    )
                    ->setMethods($methods)
                    ->getMock()
        ;
    }

    /**
     * Return mock for serializer interface.
     */
    public function getSerializerMock(array $methods = array())
    {
        return $this->getMockBuilder(
                        '\Wtk\Response\Serializer\SerializerInterface'
                    )
                    ->setMethods($methods)
                    ->getMock()
        ;
    }

}
