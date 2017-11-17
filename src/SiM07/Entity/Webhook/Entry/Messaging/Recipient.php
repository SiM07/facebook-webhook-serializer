<?php

namespace SiM07\Entity\Webhook\Entry\Messaging;

class Recipient
{
    /**
     * @var string
     */
    private $id;

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return Recipient
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }
}
