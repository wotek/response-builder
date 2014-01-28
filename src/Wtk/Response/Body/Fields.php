<?php
/**
 * @package Response
 * @subpackage Body
 *
 * @author Wojtek Zalewski <wojtek@neverbland.com>
 *
 * @copyright Copyright (c) 2013, Wojtek Zalewski
 * @license MIT
 */

namespace Wtk\Response\Body;

use Wtk\Response\Body\Field\FieldInterface;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Response body fields container.
 *
 * @author Wojtek Zalewski <wojtek@neverbland.com>
 */
class Fields implements FieldsInterface
{

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
        return $this->collection->toArray();
    }

}
