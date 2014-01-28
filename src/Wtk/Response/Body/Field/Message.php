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
class Message extends Simple implements FieldInterface
{
    /**
     *
     * @param  string     $message
     */
    public function __construct($message)
    {
        parent::__construct('message', $message);
    }
}
