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
 * Response prototype interface.
 *
 * @author Wojtek Zalewski <wojtek@neverbland.com>
 */
trait HasPrototypeTrait
{

    /**
     * Response prototype instance.
     *
     * @var PrototypeInterface
     */
    protected $prototype;

    /**
     * Sets prototype instance.
     *
     * @param  PrototypeInterface $prototype
     */
    public function setPrototype(PrototypeInterface $prototype = null)
    {
        $this->prototype = $prototype;
    }

    /**
     * Returns prototype instance.
     *
     * @return PrototypeInterface
     */
    public function getPrototype()
    {
        return $this->prototype;
    }

}
