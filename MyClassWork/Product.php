<?php

namespace MyClassWork;
class Product
{
    public $name;
    public $price;
    public $weight;
    public $area;
    public $delivery;
    public $payment;
    public $food;


    public function __construct($name, $price, $weight, $area, $delivery, $payment, $food)
    {
        $this->name = $name;
        $this->price = $price;
        $this->weight = $weight;
        $this->area = $area;
        $this->delivery = $delivery;
        $this->payment = $payment;
        $this->food = $food;

    }

    public static function createFromArray(array $data): \MyClassWork\Product
    {
        return new self ($data[0], $data[1], $data[2], $data[3], $data[4], $data[5], $data[6]);
    }


    public function __toString(): string
    {
        return $this->name;
    }
}
