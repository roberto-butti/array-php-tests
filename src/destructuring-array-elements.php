<?php

// Destructuring array elements
$fruits = [ '🍎', '🍊', '🍌', '🍋'];
echo "Destructuring by position : ";
list(,$orange,,$lemon) = $fruits;
echo $lemon . " and " . $orange . PHP_EOL;

echo "Destructuring by index : ";
[
    3 => $lemon,
    1 => $orange
] = $fruits;
echo $lemon . " and " . $orange . PHP_EOL;

echo "Destructuring by index (string) : ";
$fruits = [
    'apple'  => '🍎',
    'orange' => '🍊',
    'banana' => '🍌',
    'lemon'  => '🍋'
];
[
    'lemon' => $lemon,
    'orange' => $orange
] = $fruits;
echo $lemon . " and " . $orange . PHP_EOL;
