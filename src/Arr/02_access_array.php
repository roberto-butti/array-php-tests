<?php

require("./vendor/autoload.php");

use HiFolks\DataType\Arr;

// Create an array
$fruits = Arr::make(['🍎', '🍌']);

// First element
$first = $fruits[0];
echo $first;

echo PHP_EOL . "--~--" . PHP_EOL;

$last = $fruits[ $fruits->length() - 1];
echo $last;
echo PHP_EOL . "--~--" . PHP_EOL;
