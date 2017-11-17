<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 17/11/2017
 * Time: 22:14
 */

namespace SiM07\Entity\Webhook\Entry;

use SiM07\Entity\Webhook\Entry\Change\Value;

class Change
{
    /**
     * @var string
     */
    private $field;

    /**
     * @var Value
     */
    private $value;

    /**
     * @return string
     */
    public function getField()
    {
        return $this->field;
    }

    /**
     * @param string $field
     * @return Change
     */
    public function setField($field)
    {
        $this->field = $field;
        return $this;
    }

    /**
     * @return Value
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param Value $value
     * @return Change
     */
    public function setValue($value)
    {
        $this->value = $value;
        return $this;
    }
}
