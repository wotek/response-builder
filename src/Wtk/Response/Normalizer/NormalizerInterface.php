<?php
/**
 * @package Response
 * @subpackage Normalizer
 *
 * @author Wojtek Zalewski <wojtek@neverbland.com>
 *
 * @copyright Copyright (c) 2013, Wojtek Zalewski
 * @license MIT
 */

namespace Wtk\Response\Normalizer;

/**
 * Normalizer interface.
 *
 * @author Wojtek Zalewski <wojtek@neverbland.com>
 */
interface NormalizerInterface
{

    /**
     * Normalizes given input
     *
     * @param  mixed     $input
     *
     * @return array
     */
    function normalize($input);

}
