<?php
namespace MyClassWork;
class Volume
{
    private $count = 0;

    public function __construct()
    {
        $this->count = 0;
    }

    public function up()
    {
        $this->count++;
    }

    public function down()
    {
        $this->count--;
        if ($this->count < 0) {
            $this->count = 0;
        }
    }

    public function getValue()
    {
        return $this->count;
    }

}
