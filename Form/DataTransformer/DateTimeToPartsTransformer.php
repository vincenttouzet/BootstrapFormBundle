<?php
/**
 * This file is part of VinceTBootstrapFormBundle for Symfony2
 *
 * @category VinceT
 * @package  VinceTBootstrapFormBundle
 * @author   Vincent Touzet <vincent.touzet@gmail.com>
 * @license  MIT License view the LICENSE file that was distributed with this source code.
 * @link     https://github.com/vincenttouzet/BootstrapFormBundle
 */

namespace VinceT\BootstrapFormBundle\Form\DataTransformer;

use Symfony\Component\Form\DataTransformerInterface;
use Symfony\Component\Form\Exception\UnexpectedTypeException;

/**
 * This file is part of VinceTBootstrapFormBundle for Symfony2
 *
 * @category VinceT
 * @package  VinceTBootstrapFormBundle
 * @author   Vincent Touzet <vincent.touzet@gmail.com>
 * @license  MIT License view the LICENSE file that was distributed with this source code.
 * @link     https://github.com/vincenttouzet/BootstrapFormBundle
 */
class DateTimeToPartsTransformer implements DataTransformerInterface
{

    /**
     * Transforms a string into a DateTime.
     *
     * @param string $value String value.
     *
     * @return DateTime DateTime value.
     *
     * @throws UnexpectedTypeException if the given value is not a string
     */
    public function transform($value)
    {
        $parts = array(
            'date' => null,
            'time' => null,
        );
        if ( $value ) {
            $parts['date'] = new \DateTime($value->format('Y-m-d'));
            $parts['time'] = new \DateTime($value->format('H:i:s'));
        }
        return $parts;
    }

    /**
     * Transforms a DateTime into a string.
     *
     * @param DateTime $value DateTime value.
     *
     * @return string String value.
     *
     * @throws UnexpectedTypeException if the given value is not a DateTime
     */
    public function reverseTransform($value)
    {
        return new \DateTime(sprintf(
            '%s %s',
            $value['date']->format('Y-m-d'),
            $value['time']->format('H:i:s')
        ));
    }

}
