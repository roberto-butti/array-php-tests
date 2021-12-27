<?php

require("./vendor/autoload.php");

use HiFolks\DataType\Arr;

// Create an array
$fruits = Arr::make([
    'kiwi' => '🥝',
    'fragola' => '🍓',
    'lemon' => '🍋',
    'mango' => '🥭',
    'apple' => '🍎',
    'banana' => '🍌']);

// Loop over an array
$fruits->forEach(function ($element, $key) {
    echo $key . " " . $element . "; ";
});
// kiwi 🥝; fragola 🍓; lemon 🍋; mango 🥭; apple 🍎; banana 🍌;


echo PHP_EOL . "--~--" . PHP_EOL;
