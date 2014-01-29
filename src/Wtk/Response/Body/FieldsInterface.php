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

/**
 * Response body fields container.
 *
 * @author Wojtek Zalewski <wojtek@neverbland.com>
 */
interface FieldsInterface extends \IteratorAggregate
{

    /**
     * Adds field
     *
     * @param  FieldInterface $field
     *
     * @return void
     */
    function add(FieldInterface $field);

    /**
     * Returns field
     *
     * @param  string     $field
     *
     * @return FieldInterface
     */
    function get($field);


    function setContent($content);

    /**
     * Returns fields as an array
     *
     * @return array
     */
    function toArray();

    /**
     * Required by interface IteratorAggregate.
     *
     * {@inheritDoc}
     */
    function getIterator();

}
