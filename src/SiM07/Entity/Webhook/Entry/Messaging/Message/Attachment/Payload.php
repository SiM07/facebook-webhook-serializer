<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 19/11/2017
 * Time: 15:17
 */

namespace SiM07\Entity\Webhook\Entry\Messaging\Message\Attachment;


class Payload
{
    /**
     * @var string
     */
    private $url;

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param string $url
     * @return Payload
     */
    public function setUrl($url)
    {
        $this->url = $url;
        return $this;
    }


}