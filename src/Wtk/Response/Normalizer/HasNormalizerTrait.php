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
 * Normalizer trait.
 *
 * @author Wojtek Zalewski <wojtek@neverbland.com>
 */
trait HasNormalizerTrait
{

    /**
     * Sets normalizer instance
     *
     * @param  NormalizerInterface $normalizer
     *
     * @return void
     */
    public function setNormalizer(NormalizerInterface $normalizer)
    {
        $this->normalizer = $normalizer;
    }

    /**
     * Returns normalizer instance
     *
     * @return NormalizerInterface
     */
    public function getNormalizer()
    {
        return $this->normalizer;
    }

}
