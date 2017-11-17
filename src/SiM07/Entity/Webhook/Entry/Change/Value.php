<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 17/11/2017
 * Time: 22:16
 */

namespace SiM07\Entity\Webhook\Entry\Change;

class Value
{
    /**
     * @var string
     */
    private $item;

    /**
     * @var string
     */
    private $senderName;

    /**
     * @var string
     *
     * > item comment remove
     */
    private $commentId;

    /**
     * @var string
     */
    private $senderId;

    /**
     * @var string
     */
    private $postId;

    /**
     * @var string
     */
    private $verb;

    /**
     * @var string
     *
     * > item photo
     */
    private $link;

    /**
     * @var integer
     */
    private $published;

    /**
     * @var integer
     */
    private $createdTime;

    /**
     * @var string
     */
    private $message;

    /**
     * @return string
     */
    public function getItem()
    {
        return $this->item;
    }

    /**
     * @param string $item
     * @return Value
     */
    public function setItem($item)
    {
        $this->item = $item;
        return $this;
    }

    /**
     * @return string
     */
    public function getSenderName()
    {
        return $this->senderName;
    }

    /**
     * @param string $senderName
     * @return Value
     */
    public function setSenderName($senderName)
    {
        $this->senderName = $senderName;
        return $this;
    }

    /**
     * @return string
     */
    public function getCommentId()
    {
        return $this->commentId;
    }

    /**
     * @param string $commentId
     * @return Value
     */
    public function setCommentId($commentId)
    {
        $this->commentId = $commentId;
        return $this;
    }

    /**
     * @return string
     */
    public function getSenderId()
    {
        return $this->senderId;
    }

    /**
     * @param string $senderId
     * @return Value
     */
    public function setSenderId($senderId)
    {
        $this->senderId = $senderId;
        return $this;
    }

    /**
     * @return string
     */
    public function getPostId()
    {
        return $this->postId;
    }

    /**
     * @param string $postId
     * @return Value
     */
    public function setPostId($postId)
    {
        $this->postId = $postId;
        return $this;
    }

    /**
     * @return string
     */
    public function getVerb()
    {
        return $this->verb;
    }

    /**
     * @param string $verb
     * @return Value
     */
    public function setVerb($verb)
    {
        $this->verb = $verb;
        return $this;
    }

    /**
     * @return string
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * @param string $link
     * @return Value
     */
    public function setLink($link)
    {
        $this->link = $link;
        return $this;
    }

    /**
     * @return int
     */
    public function getPublished()
    {
        return $this->published;
    }

    /**
     * @param int $published
     * @return Value
     */
    public function setPublished($published)
    {
        $this->published = $published;
        return $this;
    }

    /**
     * @return int
     */
    public function getCreatedTime()
    {
        return $this->createdTime;
    }

    /**
     * @param int $createdTime
     * @return Value
     */
    public function setCreatedTime($createdTime)
    {
        $this->createdTime = $createdTime;
        return $this;
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param string $message
     * @return Value
     */
    public function setMessage($message)
    {
        $this->message = $message;
        return $this;
    }
}
