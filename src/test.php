<?php

require('./vendor/autoload.php');

use HiFolks\DataType\Arr;

$count = 1000000;

//$arr = Arr::make();
//$arr->fill(random_int(0,100),0 , 10000);
$time_pre = hrtime(true);
$arr = Arr::fromFunction(fn()=>1, $count);
$time_post = hrtime(true);
echo $arr->reduce(fn($result, $element) => $result + $element) . PHP_EOL;
$exec_time = $time_post - $time_pre;
echo "fromFuction      : " . str_pad($exec_time, 10, " ", STR_PAD_LEFT) . PHP_EOL;
$time_pre = hrtime(true);
$arr = Arr::fromValue(1, $count);
$time_post = hrtime(true);
echo $arr->reduce(fn($result, $element) => $result + $element) . PHP_EOL;
$exec_time = $time_post - $time_pre;

echo "fromValue        : " . str_pad($exec_time, 10, " ", STR_PAD_LEFT) . PHP_EOL;

$time_pre = hrtime(true);
$a = [];
for ($i = 0; $i < $count; $i++) {
    $a[] = 1;
}
$arr = Arr::make($a);
$time_post = hrtime(true);
echo $arr->reduce(fn($result, $element) => $result + $element) . PHP_EOL;
$exec_time = $time_post - $time_pre;
echo "with for         : " . str_pad($exec_time, 10, " ", STR_PAD_LEFT) . PHP_EOL;


//echo $arr->toString();
//echo $arr->reduce(fn($result, $element) => $result + $element);
