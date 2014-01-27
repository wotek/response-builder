<?php
/**
 * @package Response
 * @subpackage Prototype
 *
 * @author Wojtek Zalewski <wojtek@neverbland.com>
 *
 * @copyright Copyright (c) 2013, Wojtek Zalewski
 * @license MIT
 */

namespace Wtk\Response\Prototype;

/**
 * Default response prototype.
 *
 * @author Wojtek Zalewski <wojtek@neverbland.com>
 */
class DefaultPrototype implements PrototypeInterface
{
    /**
     * Headers container
     *
     * @var HeadersBagInterface
     */
    protected $headers;

    /**
     * Body container
     *
     * @var BodyBagInterface
     */
    protected $body;

    /**
     * Returns headers container
     *
     * @return HeadersBagInterface
     */
    public function getHeaders()
    {
        return new HeadersBag();
    }

    /**
     * Returns body container
     *
     * @return BodyBagInterface
     */
    function getBody()
    {
        return new BodyBag();
    }
}
