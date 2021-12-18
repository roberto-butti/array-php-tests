<?php

$count = 1000000;
$initValue = 1;
echo "Creating array with ${count} elements" . PHP_EOL;
echo "PHP: " . phpversion() . " - " . php_uname("s") . PHP_EOL;
echo "------------------+------------------" . PHP_EOL;
echo "METHOD            : TIME millisecond" . PHP_EOL;
echo "------------------+------------------" . PHP_EOL;
$time_pre = hrtime(true);
$a = array_fill(0, $count, $initValue);
$time_post = hrtime(true);
$exec_time = $time_post - $time_pre;
echo "array_fill()      : " . str_pad($exec_time / 1000000, 10, " ", STR_PAD_LEFT) . PHP_EOL;

$time_pre = hrtime(true);
$a = array_pad([], $count, $initValue);
$time_post = hrtime(true);
$exec_time = $time_post - $time_pre;
echo "array_pad()       : " . str_pad($exec_time / 1000000, 10, " ", STR_PAD_LEFT) . PHP_EOL;

$time_pre = hrtime(true);
$a = array_map(fn() => $initValue, range(0, $count - 1));
$time_post = hrtime(true);
$exec_time = $time_post - $time_pre;
echo "array_map()       : " . str_pad($exec_time / 1000000, 10, " ", STR_PAD_LEFT) . PHP_EOL;

$time_pre = hrtime(true);
for ($i = 0; $i < $count; $i++) {
    $a[$i] = $initValue;
}
$time_post = hrtime(true);
$exec_time = $time_post - $time_pre;
echo "for, with [i]     : " . str_pad($exec_time / 1000000, 10, " ", STR_PAD_LEFT) . PHP_EOL;

$time_pre = hrtime(true);
for ($i = 0; $i < $count; $i++) {
    $a[] = $initValue;
}
$time_post = hrtime(true);
$exec_time = $time_post - $time_pre;
echo "for, with []      : " . str_pad($exec_time / 1000000, 10, " ", STR_PAD_LEFT) . PHP_EOL;
