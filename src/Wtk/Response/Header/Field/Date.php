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

namespace Wtk\Response\Header\Field;

/**
 * Date field
 *
 * @author Wojtek Zalewski <wojtek@neverbland.com>
 */
class Date extends Simple
{
    public function __construct()
    {
        $this->name = 'Date';
        $this->value = new \DateTime(null, new \DateTimeZone('UTC'));
    }
}
