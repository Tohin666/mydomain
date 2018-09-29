<?php
function calculate($firstNumber, $secondNumber, $action) {
    if ($action == 'addition') {
        return $firstNumber + $secondNumber;
    } else if ($action == 'subtraction') {
        return $firstNumber - $secondNumber;
    } else if ($action == 'multiplication') {
        return $firstNumber * $secondNumber;
    } else if ($secondNumber != 0) {
        return $firstNumber / $secondNumber;
    }
}