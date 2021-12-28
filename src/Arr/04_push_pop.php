<?php

require("./vendor/autoload.php");


use HiFolks\DataType\Arr;

// Create some fruits
$fruits = Arr::make(['🥝','🍓','🍋','🥭','🍎','🍌']);

// Push a new fruit
$fruits->push('🍑');
// Loop over fruits
$fruits->forEach(function ($element, $key) {
    echo $key . " " . $element . "; ";
});
echo PHP_EOL . "--~--" . PHP_EOL;
echo $fruits->join(",");
// 🥝,🍓,🍋,🥭,🍎,🍌,🍑

$last = $fruits->pop();
$secondLast = $fruits->pop();
// Loop over fruits
$fruits->forEach(function ($element, $key) {
    echo $key . " " . $element . "; ";
});
echo PHP_EOL . "Last fruit: " . $last . PHP_EOL; // peach
echo "Second last fruit: " . $secondLast . PHP_EOL; // banana
// Last fruit: 🍑
// Second last fruit: 🍌
echo PHP_EOL . "--~--" . PHP_EOL;

// Remove an item from the beginning of an Array
$first = $fruits->shift();
// Loop over fruits
$fruits->forEach(function ($element, $key) {
    echo $key . " " . $element . "; ";
});
echo PHP_EOL . "First fruit: " . $first . PHP_EOL; // kiwi
echo PHP_EOL . "--~--" . PHP_EOL;

// Add an item to the beginning of an Array
$fruits->unshift('🍑');
// Loop over fruits
$fruits->forEach(function ($element, $key) {
    echo $key . " " . $element . "; ";
});
echo PHP_EOL . "--~--" . PHP_EOL;
