<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 19/11/2017
 * Time: 15:15
 */

namespace SiM07\Entity\Webhook\Entry\Messaging\Message;


use SiM07\Entity\Webhook\Entry\Messaging\Message\Attachment\Payload;

class Attachment
{
    /**
     * @var string
     */
    private $type;

    /**
     * @var Payload
     */
    private $payload;

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return Attachment
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return Payload
     */
    public function getPayload()
    {
        return $this->payload;
    }

    /**
     * @param Payload $payload
     * @return Attachment
     */
    public function setPayload($payload)
    {
        $this->payload = $payload;
        return $this;
    }


}