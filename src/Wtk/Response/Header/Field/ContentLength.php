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
 * ContentLength field
 *
 * @author Wojtek Zalewski <wojtek@neverbland.com>
 */
class ContentLength extends Simple
{

    /**
     * The Content-Length entity-header field indicates the size of the
     * entity-body, in decimal number of OCTETs, sent to the recipient or, in
     * the case of the HEAD method, the size of the entity-body that would
     * have been sent had the request been a GET.
     *
     * Content-Length    = "Content-Length" ":" 1*DIGIT
     *
     * @param  int     $value
     */
    public function __construct($length = null)
    {
        /**
         * @todo: Basic implementation. Add validation?
         */
        parent::__construct('Content-Length', $length);
    }

}
