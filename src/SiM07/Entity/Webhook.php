<?php

namespace SiM07\Entity;

use SiM07\Entity\Webhook\Entry;

class Webhook
{

    /**
     * @var string
     */
    private $object;

    /**
     * @var Entry[]
     */
    private $entry;

    /**
     * @return string
     */
    public function getObject()
    {
        return $this->object;
    }

    /**
     * @param string $object
     * @return Webhook
     */
    public function setObject($object)
    {
        $this->object = $object;
        return $this;
    }

    /**
     * @return array
     */
    public function getEntry()
    {
        return $this->entry;
    }

    /**
     * @param Entry[] $entry
     * @return Webhook
     */
    public function setEntry($entry)
    {
        $this->entry = $entry;
        return $this;
    }
}
