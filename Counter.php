<?php

class Counter
{
    private $count = 0;

    public function __construct(){
        $this->count = 0;
    }

    public function increment()
    {
        $this->count++;
        $this->count++;
        $this->count++;
        $this->count++;
    }

    public function decrement()
    {
        $this->count--;
    }

    public function getCount()
    {
        return $this->count;
    }
}
$myCounter = new Counter();
$myCounter->increment();
$myCounter->decrement();
echo $myCounter->getCount();