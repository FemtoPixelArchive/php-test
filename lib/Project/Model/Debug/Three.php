<?php
namespace Project\Model\Debug;


final class Three
{
    private $id;
    private $value = 'Succes';

    public function __construct()
    {
        $this->id = uniqid();
    }

    public function setValue($value)
    {
        $this->value = (string) $value;
        return $this;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function getId()
    {
        return $this->id;
    }
}
