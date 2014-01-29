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

/**
 * Response headers fields container.
 *
 * @author Wojtek Zalewski <wojtek@neverbland.com>
 */
interface FieldsInterface
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
     * Returns fields as an array
     *
     * @return array
     */
    function toArray();

    /**
     * Returns headers collection as string.
     *
     * @return string
     */
    function __toString();

}
