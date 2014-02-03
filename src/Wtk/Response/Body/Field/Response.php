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

use Wtk\Response\Body\Field;

/**
 * Message field
 *
 * @author Wojtek Zalewski <wojtek@neverbland.com>
 */
class Response extends Field implements FieldInterface
{
    /**
     *
     * @param  string     $response
     */
    public function __construct($response = null)
    {
        parent::__construct('response', $response);
    }
}
