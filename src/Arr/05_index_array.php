<?php

require("./vendor/autoload.php");

use HiFolks\DataType\Arr;

// Create some fruits
$fruits = Arr::make(['🥝','🍓','🍋','🥭','🍎','🍌']);

echo "All fruits:" . $fruits->join(",") . PHP_EOL;
// Find the index of an item in the Array
$pos = $fruits->indexOf('🍎');
echo "Find 🍎 at position: " . $pos . PHP_EOL;
// Find 🍎 at position: 4

// Remove last found fruit (apple at poistion 4)
$removedFruits = $fruits->splice($pos, 1);
echo "Removed fruits: " . $removedFruits->join(",") . PHP_EOL;
echo "Remaining fruits:" . $fruits->join(",") . PHP_EOL;

// Remove items from an index position
$removedFruits = $fruits->splice(1, 10);
echo "Removed fruits: " . $removedFruits->join(",") . PHP_EOL;
echo "Remaining fruits:" . $fruits->join(",") . PHP_EOL;

// Copy
$some = $removedFruits->slice(0, $removedFruits->length());
echo "Some Fruits: " . $some->join(",") . PHP_EOL;
