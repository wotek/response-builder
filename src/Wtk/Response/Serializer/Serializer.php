<?php
/**
 * @package Response
 * @subpackage Serializer
 *
 * @author Wojtek Zalewski <wojtek@neverbland.com>
 *
 * @copyright Copyright (c) 2013, Wojtek Zalewski
 * @license MIT
 */

namespace Wtk\Response\Serializer;

use Wtk\Response\Normalizer\NormalizerInterface;
use Wtk\Response\Normalizer\HasNormalizerTrait;

use Wtk\Response\Encoder\EncoderInterface;
use Wtk\Response\Encoder\HasEncoderTrait;

/**
 * Really basic JSON serializer.
 *
 * @author Wojtek Zalewski <wojtek@neverbland.com>
 */
class Serializer implements SerializerInterface
{

    /**
     * Uses normalizer
     */
    use HasNormalizerTrait;

    /**
     * Uses encoder
     */
    use HasEncoderTrait;

    /**
     * Normalizer instance
     *
     * @var NormalizerInterface
     */
    protected $normalizer;

    /**
     * Encoder instance
     *
     * @var EncoderInterface
     */
    protected $encoder;

    /**
     *
     * @param  NormalizerInterface     $normalizer
     * @param  EncoderInterface        $encoder
     */
    public function __construct(NormalizerInterface $normalizer, EncoderInterface $encoder)
    {
        $this->normalizer = $normalizer;
        $this->encoder = $encoder;
    }

    /**
     * Serialize given input
     *
     * @param  mixed  $input
     *
     * @return string
     */
    function serialize($input)
    {
        /**
         * Normalize input
         *
         * @var array
         */
        $normalized = $this->getNormalizer()->normalize($input);

        /**
         * Return encoded content
         *
         * @var string
         */
        return $this->getEncoder()->encode($normalized);
    }

}

