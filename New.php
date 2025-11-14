<?php

interface shape
{
    public function area(): int|float;

    public function type(): string;
}

class circle implements shape
{
    public $radius;

    public function __construct($radius)
    {
        $this->radius = $radius;
    }

    public function area(): int|float
    {
        return $this->radius;
    }

    public function type(): string
    {
        return "circle";
    }
}

class rectangle implements shape
{
    public $width;
    public $height;

    public function __construct($width, $height)
    {
        $this->width = $width;
        $this->height = $height;
    }

    public function area(): int|float
    {
        return $this->width * $this->height ;
    }

    public function type(): string
    {
        return "rectangle";
    }
}

class triangle implements shape
{
    public $line1;
    public $line2;
    public $line3;

    public function __construct($line1, $line2, $line3)
    {
        $this->line1 = $line1;
        $this->line2 = $line2;
        $this->line3 = $line3;
    }

    public function area(): int|float
    {
        return $this->line1 + $this->line2 + $this->line3;
    }

    public function type(): string
    {
        return "triangle";
    }
}

$circle = new circle(1) ;
$rectangle = new rectangle(100, 50);
$triangle = new triangle(100, 100, 100);

$figure = [$circle, $rectangle, $triangle];

foreach ($figure as $item) {
    echo $item->type() . " → area: " . $item->area() . PHP_EOL;;
}




