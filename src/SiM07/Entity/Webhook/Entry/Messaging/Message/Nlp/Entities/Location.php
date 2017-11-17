<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 19/11/2017
 * Time: 20:10
 */

namespace SiM07\Entity\Webhook\Entry\Messaging\Message\Nlp\Entities;


class Location
{
    /**
     * @var boolean
     */
    private $suggested;

    /**
     * @var float
     */
    private $confidence;

    /**
     * @var string
     */
    private $value;

    /**
     * @var string
     */
    private $type;

    /**
     * @var string
     */
    private $entity;

    /**
     * @var string
     */
    private $body;

    /**
     * @var integer
     */
    private $start;

    /**
     * @var integer
     */
    private $end;

    /**
     * @return bool
     */
    public function isSuggested()
    {
        return $this->suggested;
    }

    /**
     * @param bool $suggested
     * @return Location
     */
    public function setSuggested($suggested)
    {
        $this->suggested = $suggested;
        return $this;
    }

    /**
     * @return float
     */
    public function getConfidence()
    {
        return $this->confidence;
    }

    /**
     * @param float $confidence
     * @return Location
     */
    public function setConfidence($confidence)
    {
        $this->confidence = $confidence;
        return $this;
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param string $value
     * @return Location
     */
    public function setValue($value)
    {
        $this->value = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return Location
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return string
     */
    public function getEntity()
    {
        return $this->entity;
    }

    /**
     * @param string $entity
     * @return Location
     */
    public function setEntity($entity)
    {
        $this->entity = $entity;
        return $this;
    }

    /**
     * @return string
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @param string $body
     * @return Location
     */
    public function setBody($body)
    {
        $this->body = $body;
        return $this;
    }

    /**
     * @return int
     */
    public function getStart()
    {
        return $this->start;
    }

    /**
     * @param int $start
     * @return Location
     */
    public function setStart($start)
    {
        $this->start = $start;
        return $this;
    }

    /**
     * @return int
     */
    public function getEnd()
    {
        return $this->end;
    }

    /**
     * @param int $end
     * @return Location
     */
    public function setEnd($end)
    {
        $this->end = $end;
        return $this;
    }
}