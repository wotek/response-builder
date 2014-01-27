<?php
/**
 * @package Response
 * @subpackage Factory
 *
 * @author Wojtek Zalewski <wojtek@neverbland.com>
 *
 * @copyright Copyright (c) 2013, Wojtek Zalewski
 * @license MIT
 */

namespace Wtk\Response\Factory;

use Wtk\Response;
use Wtk\Response\Prototype\PrototypeInterface;

/**
 * JSON Responses factory.
 *
 * @author Wojtek Zalewski <wojtek@neverbland.com>
 */
class JsonFactory extends SerializerAwareFactory implements FactoryInterface
{

    /**
     * Creates JSON response.
     *
     * @param  PrototypeInterface   $prototype
     *
     * @return ResponseInterface
     */
    public function create(PrototypeInterface $prototype = null)
    {
        /**
         * Create empty response object.
         *
         * @todo: Make it possible to pass classname for DI containers.
         *
         * @var ResponseInterface
         */
        $response = new Response();

        /**
         * If user specified prototype - use it:
         */
        if(null !== $prototype) {
            $response->setPrototype($prototype);
        }

        /**
         * Set response serializer:
         */
        $response->setSerializer($this->getSerializer());

        return $response;
    }
}
