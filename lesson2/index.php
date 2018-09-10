<?php
echo '<h1>Lesson2</h1>';

echo '<h2>Task1</h2>';
$a = -5;
$b = -6;
if ($a >= 0 && $b >= 0) {
    echo $a - $b;
} else if ($a < 0 && $b < 0) {
    echo $a * $b;
} else {
    echo $a + $b;
}

echo '<h2>Task3</h2>';
function sum(int $a, int $b): int
{
    return $a + $b;
}

function deduct(int $a, int $b): int
{
    return $a - $b;
}

function mult(int $a, int $b): int
{
    return $a * $b;
}

function divide(int $a, int $b): int
{
    return $a / $b;
}

echo sum(3, 2) . '<br>';
echo deduct(3, 2) . '<br>';
echo mult(3, 2) . '<br>';
echo divide(3, 2) . '<br>';

echo '<h2>Task4</h2>';
function mathOperation(int $a, int $b, string $operation): int
{
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

echo '<h2>Task6</h2>';
function power(int $val, int $pow): int
{
    return $pow >= 1 ? $val * power($val, $pow - 1) : 1;
}

echo power(2, 3);

echo '<h2>Task7</h2>';
$hour = date('H');
$minute = date('i');
if ($hour == 0 || ($hour >= 5 && $hour <= 20)) {
    $hourString = ' часов ';
} elseif ($hour == 1 || $hour == 21) {
    $hourString = ' час ';
} else {
    $hourString = ' часа ';
}
if ($minute % 10 == 0 || ($minute >= 5 && $minute <= 20) || ($minute % 10 >= 5 && $minute % 10 <= 9)) {
    $minuteString = ' минут';
} elseif ($minute % 10 == 1) {
    $minuteString = ' минута';
} else {
    $minuteString = ' минуты';
}
echo $hour . $hourString . $minute . $minuteString;