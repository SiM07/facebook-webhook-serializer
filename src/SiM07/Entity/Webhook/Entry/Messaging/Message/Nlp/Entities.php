<?php

namespace SiM07\Entity\Webhook\Entry\Messaging\Message\Nlp;

use SiM07\Entity\Webhook\Entry\Messaging\Message\Nlp\Entities\Email;
use SiM07\Entity\Webhook\Entry\Messaging\Message\Nlp\Entities\Location;
use SiM07\Entity\Webhook\Entry\Messaging\Message\Nlp\Entities\Datetime;



class Entities
{
    /**
     * @var Email[]
     */
    private $email;

    /**
     * @var Location[]
     */
    private $location;

    /**
     * @var Datetime[]
     */
    private $datetime;

    /**
     * @return Email[]
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param Email[] $email
     * @return Entities
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return Location[]
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @param Location[] $location
     * @return Entities
     */
    public function setLocation($location)
    {
        $this->location = $location;
        return $this;
    }

    /**
     * @return Datetime[]
     */
    public function getDatetime()
    {
        return $this->datetime;
    }

    /**
     * @param Datetime[] $datetime
     * @return Entities
     */
    public function setDatetime($datetime)
    {
        $this->datetime = $datetime;
        return $this;
    }


}
