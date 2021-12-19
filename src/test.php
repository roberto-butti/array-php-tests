<?php

require('./vendor/autoload.php');
use HiFolks\DataType\Arr;

function report(string $label, int $exec_time, int $mem_usage): void
{
    echo str_pad($label, 18) . ": ";
    echo str_pad(strval($exec_time / 1000000), 16, " ", STR_PAD_LEFT) . " : ";
    echo str_pad(strval(intval($mem_usage / 1024)), 8, " ", STR_PAD_LEFT) . " kb";
    echo PHP_EOL;
}
$count = 1000000;
$initValue = 1;
echo "Creating array with ${count} elements" . PHP_EOL;
echo "PHP: " . phpversion() . " - " . php_uname("s") . PHP_EOL;
$xdebug = phpversion("xdebug") ?: "NOT LOADED";
echo "Xdebug : " . $xdebug . PHP_EOL;
echo "------------------+------------------+------------------" . PHP_EOL;
echo "METHOD            | TIME ms.         | Memory usage KB  " . PHP_EOL;
echo "------------------+------------------+------------------" . PHP_EOL;
$time_pre = hrtime(true);
$mem_pre = memory_get_usage();
$arr = Arr::fromFunction(fn()=>1, $count);
$time_post = hrtime(true);
$mem_post = memory_get_usage();
$exec_time = $time_post - $time_pre;
report("Arr::fromFunction", $exec_time, $mem_post - $mem_pre);

unset($arr);

$time_pre = hrtime(true);
$mem_pre = memory_get_usage();
$arr = Arr::fromValue($initValue, $count);
$time_post = hrtime(true);
$mem_post = memory_get_usage();
$exec_time = $time_post - $time_pre;
report("Arr::fromValue", $exec_time, $mem_post - $mem_pre);

unset($arr);

$time_pre = hrtime(true);
$mem_pre = memory_get_usage();
$a = [];
for ($i = 0; $i < $count; $i++) {
    $a[] = 1;
}
$arr = Arr::make($a);
$time_post = hrtime(true);
$mem_post = memory_get_usage();
$exec_time = $time_post - $time_pre;
report("make with array", $exec_time, $mem_post - $mem_pre);

unset($a);
unset($arr);

$time_pre = hrtime(true);
$mem_pre = memory_get_usage();

$arr = Arr::make();
for ($i = 0; $i < $count; $i++) {
    $arr[] = 1;
}
$time_post = hrtime(true);
$mem_post = memory_get_usage();
$exec_time = $time_post - $time_pre;
report("ArrayAccess", $exec_time, $mem_post - $mem_pre);

unset($a);
unset($arr);
