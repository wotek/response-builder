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

namespace Wtk\Response\Body\Field;

/**
 * Message field
 *
 * @author Wojtek Zalewski <wojtek@neverbland.com>
 */
class Errors extends Simple implements FieldInterface
{
    /**
     *
     * @param  string     $errors
     */
    public function __construct(array $errors = array())
    {
        parent::__construct('errors', $errors);
    }
}
