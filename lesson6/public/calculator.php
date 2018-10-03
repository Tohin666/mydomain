<?php
header('Content-type: text/html, charset=utf-8');

include __DIR__ . '/../config/mainConfig.php';
include ENGINES_DIR . 'calculatorFunctions.php';

if ($_GET) {
    $result = calculate($_GET['firstNumber'], $_GET['secondNumber'], $_GET['action']);

}

include TEMPLATES_DIR . 'calculatorTemplate.php';