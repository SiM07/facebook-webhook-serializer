<?php

namespace SiM07\Entity\Webhook\Entry;

use SiM07\Entity\Webhook\Entry\Messaging\Message;
use SiM07\Entity\Webhook\Entry\Messaging\Recipient;
use SiM07\Entity\Webhook\Entry\Messaging\Sender;

class Messaging
{
    /**
     * @var Sender
     */
    private $sender;

    /**
     * @var Recipient
     */
    private $recipient;

    /**
     * @var integer
     */
    private $timestamp;

    /**
     * @var Message
     */
    private $message;

    /**
     * @return Sender
     */
    public function getSender()
    {
        return $this->sender;
    }

    /**
     * @param Sender $sender
     * @return Messaging
     */
    public function setSender($sender)
    {
        $this->sender = $sender;
        return $this;
    }

    /**
     * @return Recipient
     */
    public function getRecipient()
    {
        return $this->recipient;
    }

    /**
     * @param Recipient $recipient
     * @return Messaging
     */
    public function setRecipient($recipient)
    {
        $this->recipient = $recipient;
        return $this;
    }

    /**
     * @return int
     */
    public function getTimestamp()
    {
        return $this->timestamp;
    }

    /**
     * @param int $timestamp
     * @return Messaging
     */
    public function setTimestamp($timestamp)
    {
        $this->timestamp = $timestamp;
        return $this;
    }

    /**
     * @return Message
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param Message $message
     * @return Messaging
     */
    public function setMessage($message)
    {
        $this->message = $message;
        return $this;
    }
}
