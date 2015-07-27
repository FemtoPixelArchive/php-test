<?php
namespace Project\Mock\Debug;


class One
{
    private $count = 0;

    public function getCounter()
    {
        return $this->count;
    }

    public function doSomething()
    {
        $this->count++;
    }
}
