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
use Wtk\Response\Body\Field\Simple;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Response body fields container.
 *
 * @author Wojtek Zalewski <wojtek@neverbland.com>
 */
class Fields implements FieldsInterface
{

    /**
     * @todo: Audit code for headers and body fields.
     * See what can be unified, what abstracted. They might follow
     * the same interface.
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
        $this->collection->set($field->getName(), $field);
    }

    /**
     * Returns field
     *
     * @param  string     $field
     *
     * @return FieldInterface
     */
    public function get($field)
    {
        return $this->collection->get($field);
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

    /**
     * Required by interface IteratorAggregate.
     *
     * {@inheritDoc}
     */
    public function getIterator()
    {
        return $this->collection->getIterator();
    }

    /**
     * Method for single content.
     *
     * @todo: Rethink it.
     *
     * @param  mixed     $content
     *
     * @return void
     */
    public function setContent($content)
    {
        $field = new Field('content', $content);

        $this->add($field);
    }


}
