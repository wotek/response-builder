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
 * Encoder interface.
 *
 * @author Wojtek Zalewski <wojtek@neverbland.com>
 */
interface EncoderInterface
{

    /**
     * Encodes given input
     *
     * @param  array     $input
     *
     * @return string
     */
    function encode($input);

}
