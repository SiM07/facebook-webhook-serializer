<?php

namespace SiM07\Entity\Webhook\Entry\Messaging\Message;

class QuickReply
{
    /**
     * @var string
     */
    private $payload;

    /**
     * @return string
     */
    public function getPayload()
    {
        return $this->payload;
    }

    /**
     * @param string $payload
     * @return QuickReply
     */
    public function setPayload($payload)
    {
        $this->payload = $payload;
        return $this;
    }
}
