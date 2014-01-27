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
     * Fields array collection
     *
     * @var ArrayCollection
     */
    protected $collection;

    public function __construct()
    {
        $this->collection = new ArrayCollection();
    }

    public function add(FieldInterface $field)
    {
        $this->collection->add($field);
    }

    public function toArray()
    {
        return $this->collection->toArray();
    }
}
