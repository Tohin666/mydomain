<?php
header('Content-type: text/html, charset=utf-8');

include __DIR__ . '/../config/mainConfig.php';
include ENGINE_DIR . 'dbEngine.php';
include ENGINE_DIR . 'productsFunctions.php';
include ENGINE_DIR . 'render.php';
include ENGINE_DIR . 'base.php';

session_start();

if ($_GET) {
    unset($_SESSION['cart'][array_keys($_GET)[0]]);
}

$cartArray = getCart();

render('cartTemplate', ['cartArray' => $cartArray]);
