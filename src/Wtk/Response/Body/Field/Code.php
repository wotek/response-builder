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
class Code extends Simple implements FieldInterface
{
    /**
     *
     * @param  int     $code
     */
    public function __construct($code)
    {
        parent::__construct('code', $code);
    }
}
