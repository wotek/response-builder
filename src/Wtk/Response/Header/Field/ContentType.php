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
 * ContentType field
 *
 * @author Wojtek Zalewski <wojtek@neverbland.com>
 */
class ContentType extends Simple
{

    public function __construct($type = 'text/html;', $charset = 'UTF-8')
    {
        /**
         * @see http://www.w3.org/Protocols/rfc2616/rfc2616-sec14.html
         * @todo: Make it more configurable.
         *
         * This will have to do it for now:
         */
        $content_type = $type.$charset;

        parent::__construct('Content-Type', $type);
    }

}
