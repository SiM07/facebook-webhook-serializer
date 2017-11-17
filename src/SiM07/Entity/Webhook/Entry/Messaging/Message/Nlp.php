<?php

namespace SiM07\Entity\Webhook\Entry\Messaging\Message;

use SiM07\Entity\Webhook\Entry\Messaging\Message\Nlp\Entities;

class Nlp
{
    /**
     * @var Entities
     */
    private $entities;

    /**
     * @return Entities
     */
    public function getEntities()
    {
        return $this->entities;
    }

    /**
     * @param Entities $entities
     * @return Nlp
     */
    public function setEntities($entities)
    {
        $this->entities = $entities;
        return $this;
    }
}
