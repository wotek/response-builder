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

use Wtk\Response\Body\FieldsInterface;

/**
 * Normalizer interface.
 *
 * @author Wojtek Zalewski <wojtek@neverbland.com>
 */
class FieldsNormalizer implements NormalizerInterface
{

    /**
     * Normalizes objects implementing FieldsInterface.
     *
     * @param  FieldsInterface     $input
     *
     * @return array
     */
    public function normalize(/* FieldsInterface */ $input)
    {
        if(!$input instanceof FieldsInterface) {
            throw new \RuntimeException(
                "As input normalizer requires an ArrayCollection instance"
            );
        }

        $iterator = new \RecursiveArrayIterator($input->getIterator());

        $result = array();

        foreach ($iterator as $fieldname => $field) {
            $result += $field->toArray();
        }

        return $result;
    }

}
