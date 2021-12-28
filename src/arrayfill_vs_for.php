<?php

function report(string $label, int $exec_time, int $mem_usage): void
{
    echo str_pad($label, 18) . ": ";
    $millisecond = $exec_time / 1000000;
    echo str_pad(strval(number_format($millisecond, 6)), 16, " ", STR_PAD_LEFT) . " : ";
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
$a = array_fill(0, $count, $initValue);
$time_post = hrtime(true);
$mem_post = memory_get_usage();
$exec_time = $time_post - $time_pre;
report("array_fill()", $exec_time, $mem_post - $mem_pre);

unset($a);

$time_pre = hrtime(true);
$mem_pre = memory_get_usage();
$a = array_pad([], $count, $initValue);
$time_post = hrtime(true);
$mem_post = memory_get_usage();
$exec_time = $time_post - $time_pre;
report("array_pad()", $exec_time, $mem_post - $mem_pre);

unset($a);

$time_pre = hrtime(true);
$mem_pre = memory_get_usage();
$a = array_map(fn () => $initValue, range(0, $count - 1));
$time_post = hrtime(true);
$mem_post = memory_get_usage();
$exec_time = $time_post - $time_pre;
report("array_map()", $exec_time, $mem_post - $mem_pre);

unset($a);

$time_pre = hrtime(true);
$mem_pre = memory_get_usage();
for ($i = 0; $i < $count; $i++) {
    $a[$i] = $initValue;
}
$time_post = hrtime(true);
$mem_post = memory_get_usage();
$exec_time = $time_post - $time_pre;
report("for, with [i]", $exec_time, $mem_post - $mem_pre);

unset($a);

$time_pre = hrtime(true);
$mem_pre = memory_get_usage();
for ($i = 0; $i < $count; $i++) {
    $a[] = $initValue;
}
$time_post = hrtime(true);
$mem_post = memory_get_usage();
$exec_time = $time_post - $time_pre;
report("for, with []", $exec_time, $mem_post - $mem_pre);

unset($a);

$time_pre = hrtime(true);
$mem_pre = memory_get_usage();
$a = new SplFixedArray($count);
for ($i = 0; $i < $count; $i++) {
    $a[$i] = $initValue;
}
$time_post = hrtime(true);
$mem_post = memory_get_usage();
$exec_time = $time_post - $time_pre;
report("Fix arr with init", $exec_time, $mem_post - $mem_pre);

unset($a);

$time_pre = hrtime(true);
$mem_pre = memory_get_usage();
$a = new SplFixedArray($count);
$time_post = hrtime(true);
$mem_post = memory_get_usage();
$exec_time = $time_post - $time_pre;
report("Fix arr NO init", $exec_time, $mem_post - $mem_pre);

unset($a);

$time_pre = hrtime(true);
$mem_pre = memory_get_usage();
$a = range(0, $count - 1);
for ($i = 0; $i < $count; $i++) {
    $a[$i] = $initValue;
}
$time_post = hrtime(true);
$mem_post = memory_get_usage();
$exec_time = $time_post - $time_pre;
report("range() with init", $exec_time, $mem_post - $mem_pre);

unset($a);

$time_pre = hrtime(true);
$mem_pre = memory_get_usage();
$a = range(0, $count - 1);
$time_post = hrtime(true);
$mem_post = memory_get_usage();
$exec_time = $time_post - $time_pre;
report("range() NO init", $exec_time, $mem_post - $mem_pre);
