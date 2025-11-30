<?php

spl_autoload_register(function ($class) {
    $class = str_replace('\\', '/', $class);
    include $class . '.php';
});

use MyClassWork\Volume;

$tv = new Volume;
$tv->up();
$tv->down();
$tv->getValue();

echo $tv->getValue();
