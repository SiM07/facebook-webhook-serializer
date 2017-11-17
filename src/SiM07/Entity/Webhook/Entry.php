<?php

namespace SiM07\Entity\Webhook;

use SiM07\Entity\Webhook\Entry\Change;
use SiM07\Entity\Webhook\Entry\Messaging;

class Entry
{

    /**
     * @var string
     */
    private $id;

    /**
     * @var integer
     */
    private $time;

    /**
     * @var Messaging[]
     */
    private $messaging;

    /**
     * @var Change[]
     */
    private $changes;

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return Entry
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return int
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * @param int $time
     * @return Entry
     */
    public function setTime($time)
    {
        $this->time = $time;
        return $this;
    }

    /**
     * @return Messaging[]
     */
    public function getMessaging()
    {
        return $this->messaging;
    }

    /**
     * @param Messaging[] $messaging
     * @return Entry
     */
    public function setMessaging($messaging)
    {
        $this->messaging = $messaging;
        return $this;
    }

    /**
     * @return Change[]
     */
    public function getChanges()
    {
        return $this->changes;
    }

    /**
     * @param Change[] $changes
     * @return Entry
     */
    public function setChanges($changes)
    {
        $this->changes = $changes;
        return $this;
    }
}
