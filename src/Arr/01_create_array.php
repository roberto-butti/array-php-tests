<?php

require("./vendor/autoload.php");

use HiFolks\DataType\Arr;

// Create an array
$fruits = Arr::make(['🍎', '🍌']);

// Length of an array
echo $fruits->length();
// Output: 2
echo PHP_EOL . "--~--" . PHP_EOL;
