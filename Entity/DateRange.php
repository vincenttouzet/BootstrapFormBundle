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
class DateRange implements \Iterator, \ArrayAccess, \Serializable
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
     * date between from and to dates (from and to included)
     *
     * @var array
     */
    private $dates = array();
    private $index = 0;

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
        $this->index = 0;
    }

    /**
     * Build dates between "from" and "to" ("from" and "to" included)
     *
     * @return [type]
     */
    private function _buildDates()
    {
        if ( !$this->from || !$this->to || $this->from > $this->to ) {
            return;
        }
        $this->dates = array();
        $d = clone $this->from;
        $this->dates[] = clone $d;
        while ( $d != $this->to ) {
            $d->add(new \DateInterval('P1D'));
            $this->dates[] = clone $d;
        }
    }

    /**
     * Gets the interval between the two dates
     *
     * @return DateInterval
     */
    public function getDateInterval()
    {
        if ( !$this->from && !$this->to ) {
            return null;
        }
        return $this->from->diff($this->to);
    }

    /**
     * Gets From
     * 
     * @return DateTime
     */
    public function getFrom()
    {
        return $this->from;
    }
    
    /**
     * Sets From
     * 
     * @param DateTime $from From
     * 
     * @return VinceT\BootstrapFormBundle\Entity\DateRange
     */
    public function setFrom($from)
    {
        $this->from = $from;
        $this->_buildDates();
        return $this;
    }

    /**
     * Gets To
     * 
     * @return DateTime
     */
    public function getTo()
    {
        return $this->to;
    }
    
    /**
     * Sets To
     * 
     * @param DateTime $to To
     * 
     * @return VinceT\BootstrapFormBundle\Entity\DateRange
     */
    public function setTo($to)
    {
        $this->to = $to;
        $this->_buildDates();
        return $this;
    }

    /**
     * Gets dates between "from" and "to" ("from" and "to" included)
     *
     * @return array
     */
    public function getDates()
    {
        return $this->dates;
    }

    /**
     * {@inheritdoc}
     * 
     * @return null
     */
    public function rewind()
    {
        $this->index = 0;
    }

    /**
     * {@inheritdoc}
     * 
     * @return \DateTime
     */
    public function current()
    {
        return $this->dates[$this->index];
    }

    /**
     * {@inheritdoc}
     * 
     * @return integer
     */
    public function key()
    {
        return $this->index;
    }

    /**
     * {@inheritdoc}
     * 
     * @return null
     */
    public function next()
    {
        ++$this->index;
    }

    /**
     * {@inheritdoc}
     * 
     * @return boolean
     */
    public function valid()
    {
        return isset($this->dates[$this->index]);
    }

    /**
     * {@inheritdoc}
     * 
     * @param integer   $offset Offset
     * @param \DateTime $value  value
     * 
     * @return null
     */
    public function offsetSet($offset, $value)
    {
        // do not let possibility to add / edit date
    }

    /**
     * {@inheritdoc}
     * 
     * @param integer $offset Offset
     * 
     * @return boolean
     */
    public function offsetExists($offset)
    {
        return isset($this->dates[$offset]);
    }

    /**
     * {@inheritdoc}
     *
     * @param integer $offset Offset
     * 
     * @return null
     */
    public function offsetUnset($offset)
    {
        unset($this->dates[$offset]);
    }

    /**
     * {@inheritdoc}
     * 
     * @param integer $offset Offset
     * 
     * @return \DateTime|null
     */
    public function offsetGet($offset)
    {
        return isset($this->dates[$offset]) ? $this->dates[$offset] : null;
    }

    /**
     * {@inheritdoc}
     * 
     * @return string
     */
    public function serialize()
    {
        $dates = array(
            'from' => $this->from,
            'to' => $this->to
        );
        return serialize($dates);
    }

    /**
     * {@inheritdoc}
     * 
     * @param string $data Data to unserialize
     * 
     * @return null
     */
    public function unserialize($data)
    {
        $dates = unserialize($data);
        $this->setFrom($dates['from']);
        $this->setTo($dates['to']);
    }
}