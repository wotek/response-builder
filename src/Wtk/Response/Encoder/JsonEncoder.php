<?php
/**
 * @package Response
 * @subpackage Encoder
 *
 * @author Wojtek Zalewski <wojtek@neverbland.com>
 *
 * @copyright Copyright (c) 2013, Wojtek Zalewski
 * @license MIT
 */

namespace Wtk\Response\Encoder;

/**
 * JSON Encoder
 *
 * @author Wojtek Zalewski <wojtek@neverbland.com>
 */
class JsonEncoder implements EncoderInterface
{

    /**
     * Encodes given input to JSON string
     *
     * @param  array     $input
     *
     * @return string
     */
    public function encode($input)
    {
        /**
         * @see http://pl1.php.net/manual/en/json.constants.php
         */
        return json_encode(
            $input,
            JSON_HEX_TAG
            | JSON_HEX_APOS
            | JSON_HEX_AMP
            | JSON_HEX_QUOT
        );
    }
}
