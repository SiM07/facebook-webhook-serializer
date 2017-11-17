<?php

namespace SiM07\Entity\Webhook\Entry\Messaging;

use SiM07\Entity\Webhook\Entry\Messaging\Message\Nlp;
use SiM07\Entity\Webhook\Entry\Messaging\Message\QuickReply;
use SiM07\Entity\Webhook\Entry\Messaging\Message\Attachment;

class Message
{
    /**
     * @var QuickReply
     */
    private $quickReply;

    /**
     * @var string
     */
    private $mid;

    /**
     * @var integer
     */
    private $seq;

    /**
     * @var string
     */
    private $text;

    /**
     * @var Attachment[]
     */
    private $attachments;

    /**
     * @var Nlp
     */
    private $nlp;

    /**
     * @return QuickReply
     */
    public function getQuickReply()
    {
        return $this->quickReply;
    }

    /**
     * @param QuickReply $quickReply
     * @return Message
     */
    public function setQuickReply($quickReply)
    {
        $this->quickReply = $quickReply;
        return $this;
    }

    /**
     * @return string
     */
    public function getMid()
    {
        return $this->mid;
    }

    /**
     * @param string $mid
     * @return Message
     */
    public function setMid($mid)
    {
        $this->mid = $mid;
        return $this;
    }

    /**
     * @return int
     */
    public function getSeq()
    {
        return $this->seq;
    }

    /**
     * @param int $seq
     * @return Message
     */
    public function setSeq($seq)
    {
        $this->seq = $seq;
        return $this;
    }

    /**
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param string $text
     * @return Message
     */
    public function setText($text)
    {
        $this->text = $text;
        return $this;
    }

    /**
     * @return Nlp
     */
    public function getNlp()
    {
        return $this->nlp;
    }

    /**
     * @param Nlp $nlp
     * @return Message
     */
    public function setNlp($nlp)
    {
        $this->nlp = $nlp;
        return $this;
    }

    /**
     * @return Attachment[]
     */
    public function getAttachments()
    {
        return $this->attachments;
    }

    /**
     * @param Attachment[] $attachments
     * @return Message
     */
    public function setAttachments($attachments)
    {
        $this->attachments = $attachments;
        return $this;
    }


}
