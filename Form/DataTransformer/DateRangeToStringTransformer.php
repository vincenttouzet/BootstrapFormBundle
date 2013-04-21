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
use VinceT\BootstrapFormBundle\Entity\DateRange;

/**
 * DateRangeToStringTransformer
 *
 * @category VinceT
 * @package  VinceTBootstrapFormBundle
 * @author   Vincent Touzet <vincent.touzet@gmail.com>
 * @license  MIT License view the LICENSE file that was distributed with this source code.
 * @link     https://github.com/vincenttouzet/BootstrapFormBundle
 */
class DateRangeToStringTransformer implements DataTransformerInterface
{
    protected $dateSeparator;

    /**
     * __construct
     *
     * @param string $dateSeparator DateRange separator for the string representation
     */
    public function __construct($dateSeparator = ' - ')
    {
        $this->dateSeparator = $dateSeparator;
    }

    /**
     * Transforms a DateRange into a string.
     *
     * @param DateRange $value DateRange value.
     *
     * @return string string value.
     */
    public function transform($value)
    {
        if ( $value ) {
            $from = '';
            if ( $value->getFrom() ) {
                $from = $value->getFrom()->format('Y-m-d');
            }
            $to = '';
            if ( $value->getTo() ) {
                $to = $value->getTo()->format('Y-m-d');
            }
            return sprintf(
                '%s%s%s',
                $from,
                $this->dateSeparator,
                $to
            );
        }
    }

    /**
     * Transforms a string into a DateRange.
     *
     * @param string $value String value.
     *
     * @return DateRange DateRange value.
     */
    public function reverseTransform($value)
    {
        $parts = explode($this->dateSeparator, $value);
        $from = isset($parts[0]) ? $parts[0] : null;        
        $to = isset($parts[1]) ? $parts[1] : null;
        return new DAteRange($from, $to);
    }

}
