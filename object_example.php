<?php

class User {
    public $name;
    public $age;
    public $weight;
}
$Eugene = new User;
$Eugene->name = 'Eugene';
$Eugene->age = 37;
$Eugene->weight = 110;
$Daria = new User;
$Daria->name = 'Daria';
$Daria->age = 35;
$Daria->weight = 50;
$Mark = new User;
$Mark->name = 'Mark';
$Mark->age = 5;
$Mark->weight = 20;
echo  'Name:' . "\t" .  "Age:\t" . "Weight:\t" . "\n";
echo $Eugene->name . "\t" . $Eugene->age ."\t". $Eugene->weight . "\n";
echo $Daria->name . "\t". $Daria->age ."\t" . $Daria->weight . "\n";
echo $Mark->name . "\t". $Mark->age ."\t". $Mark->weight . "\n";
