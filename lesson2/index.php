<?php

// Task1

$a = -5;
$b = -6;

if ($a >= 0 && $b >=0):
    echo $a - $b;
elseif ($a < 0 && $b <0):
    echo $a * $b;
else:
    echo $a + $b;
endif;
