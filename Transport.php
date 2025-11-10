<?php

class Transport
{
    public $name;

    public function spec()
    {
        echo 'Transport:' . $this->name . "\n";
    }
}

class Car extends Transport
{
    public $color;
    public $weight;

    public function spec()
    {
        echo 'Car:' . $this->name . ',' . $this->weight . ',' . $this->color . "\n";
    }
}

class Bike extends Car
{
    public $size;

    public function spec()
    {
        echo 'Bike:' . $this->color . ',' . $this->weight . $this->size . "\n";
    }

}

$Transport = new Transport;
$Transport->name = 'Car,Bike';

$Car = new Car;
$Car->name = 'BMW';
$Car->weight = 2500;
$Car->color = 'RED';

$Bike = new Bike;
$Bike->color = 'BLUE';
$Bike->size = 28;

$Transport->spec();
$Car->spec();
$Bike->spec();


