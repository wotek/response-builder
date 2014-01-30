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
 * TransferEncoding field
 *
 * @author Wojtek Zalewski <wojtek@neverbland.com>
 */
class TransferEncoding extends Simple
{

    /**
     * The Transfer-Encoding general-header field indicates what (if any) type
     * of transformation has been applied to the message body in order to
     * safely transfer it between the sender and the recipient. This differs
     * from the content-coding in that the transfer-coding is a property of
     * the message, not of the entity.
     *
     * If multiple encodings have been applied to an entity,
     * the transfer- codings MUST be listed in the order in which they were
     * applied. Additional information about the encoding parameters MAY be
     * provided by other entity-header fields not defined by this
     * specification.
     *
     * @see http://www.w3.org/Protocols/rfc2616/rfc2616-sec14.html
     *
     * @param  string     $transfer_encoding
     */
    public function __construct($transfer_encoding = 'chunked')
    {
        parent::__construct('Transfer-Encoding', $transfer_encoding);
    }

}
