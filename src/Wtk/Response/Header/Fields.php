<?php
/**
 * @package Response
 * @subpackage Header
 *
 * @author Wojtek Zalewski <wojtek@neverbland.com>
 *
 * @copyright Copyright (c) 2013, Wojtek Zalewski
 * @license MIT
 */

namespace Wtk\Response\Header;

use Wtk\Response\Header\Field\FieldInterface;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Response headers fields container.
 *
 * @author Wojtek Zalewski <wojtek@neverbland.com>
 */
class Fields implements FieldsInterface
{
    /**
     * @idea: Fields can extend ArrayCollection for tha t matter
     * Do it when tested, and see whether it breaks stuff or not.
     */

    /**
     * Fields array collection
     *
     * @var ArrayCollection
     */
    protected $collection;

    /**
     *
     */
    public function __construct()
    {
        $this->collection = new ArrayCollection();
    }

    /**
     * Adds field
     *
     * @param  FieldInterface $field
     *
     * @return void
     */
    public function add(FieldInterface $field)
    {
        $this->collection->add($field);
    }

    /**
     * Returns fields as an array
     *
     * @return array
     */
    public function toArray()
    {
        /**
         * @todo: DO we bother that we have objects inside
         */
        return $this->collection->toArray();
    }

    /**
     * Returns headers collection as string.
     *
     * @todo: Should implement SerializableInterface
     * So we can call serializer on it. Without this freaky __toString method.
     *
     * @return string
     */
    public function __toString()
    {
        /**
         * Walk through array and make it strings
         *
         * @var ArrayCollection
         */
        $collection = $this->collection->map(function($element) {
            return $element->stringify();
        });

        /**
         * Each header in new line
         */
        return implode("\n\r", $collection->toArray());
    }

}
