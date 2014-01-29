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
 * Encoder trait.
 *
 * @author Wojtek Zalewski <wojtek@neverbland.com>
 */
trait HasEncoderTrait
{

    /**
     * Sets encoder instance
     *
     * @param  EncoderInterface $encoder
     */
    public function setEncoder(EncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    /**
     * Returns encoder instance
     *
     * @return EncoderInterface
     */
    public function getEncoder()
    {
        return $this->encoder;
    }

}
