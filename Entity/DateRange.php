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

namespace VinceT\BootstrapFormBundle\Entity;

/**
 * DateRange entity class
 *
 * @category VinceT
 * @package  VinceTBootstrapFormBundle
 * @author   Vincent Touzet <vincent.touzet@gmail.com>
 * @license  MIT License view the LICENSE file that was distributed with this source code.
 * @link     https://github.com/vincenttouzet/BootstrapFormBundle
 */
class DateRange
{
    /**
     * from Date
     *
     * @var DateTime|null
     */
    private $from = null;

    /**
     * to Date
     *
     * @var DateTime|null
     */
    private $to = null;

    /**
     * __construct
     *
     * @param string|DateTime $from From date
     * @param string|DateTime $to   To date
     */
    public function __construct($from = null, $to = null)
    {
        if ( $from ) {
            if ( is_string($from) ) {
                $from = new \DateTime($from);
            }
        }
        $this->setFrom($from);
        if ( $to ) {
            if ( is_string($to) ) {
                $to = new \DateTime($to);
            }
        }
        $this->setTo($to);
    }

    /**
     * Gets From
     * 
     * @return [type]
     */
    public function getFrom()
    {
        return $this->from;
    }
    
    /**
     * Sets From
     * 
     * @param [type] $from From
     * 
     * @return [type]
     */
    public function setFrom($from)
    {
        $this->from = $from;
        return $this;
    }

    /**
     * Gets To
     * 
     * @return [type]
     */
    public function getTo()
    {
        return $this->to;
    }
    
    /**
     * Sets To
     * 
     * @param [type] $to To
     * 
     * @return [type]
     */
    public function setTo($to)
    {
        $this->to = $to;
        return $this;
    }
    
    
}