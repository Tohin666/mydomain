<?php
echo '<h1>Lesson2</h1>';

echo '<h2>Task1</h2>';
$a = -5;
$b = -6;
if ($a >= 0 && $b >=0):
    echo $a - $b;
elseif ($a < 0 && $b <0):
    echo $a * $b;
else:
    echo $a + $b;
endif;

echo '<h2>Task2</h2>';
$a = 4;
switch ($a) {
    case 0:
        echo $a . ', ';
    case 1:
        $a =1;
        echo $a . ', ';
    case 2:
        $a =2;
        echo $a . ', ';
    case 3:
        $a =3;
        echo $a . ', ';
    case 4:
        $a =4;
        echo $a . ', ';
    case 5:
        $a =5;
        echo $a . ', ';
    case 6:
        $a =6;
        echo $a . ', ';
    case 7:
        $a =7;
        echo $a . ', ';
    case 8:
        $a =8;
        echo $a . ', ';
    case 9:
        $a =9;
        echo $a . ', ';
    case 10:
        $a =10;
        echo $a . ', ';
    case 11:
        $a =11;
        echo $a . ', ';
    case 12:
        $a =12;
        echo $a . ', ';
    case 13:
        $a =13;
        echo $a . ', ';
    case 14:
        $a =14;
        echo $a . ', ';
    case 15:
        $a =15;
        echo $a;
}

echo '<h2>Task3</h2>';
function sum(int $a, int $b): int {
    return $a + $b;
}
function deduct(int $a, int $b): int {
    return $a - $b;
}
function mult(int $a, int $b): int {
    return $a * $b;
}
function divide(int $a, int $b): int {
    return $a / $b;
}
echo sum(3,2) . '<br>';
echo deduct(3,2) . '<br>';
echo mult(3,2) . '<br>';
echo divide(3,2) . '<br>';

echo '<h2>Task4</h2>';
function mathOperation(int $a, int $b, string $operation): int {
    switch ($operation) {
        case '+':
            return sum($a, $b);
        case '-':
            return deduct($a, $b);
        case '*':
            return mult($a, $b);
        case '/':
            return divide($a, $b);
    }
}
echo mathOperation(3, 2, '*');

echo '<h2>Task5</h2>';
echo date('Y');

echo '<h2>Task6</h2>';
function power(int $val, int $pow): int {
    $result = $result ?? $val;

    $val *= $result;
    return $pow > 1 ? power($val, $pow - 1) : $result;
//    if ($pow > 1) {
//        power($val, $pow - 1);
//    }
//     return $val;

}
echo power(2, 3);