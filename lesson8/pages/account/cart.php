<?php
//header('Content-type: text/html, charset=utf-8');
//
//include __DIR__ . '/../config/mainConfig.php';
//include ENGINE_DIR . 'autoload.php';
//
//session_start();

if (array_values($_GET)[0] == 'Удалить') {
//if (count($_GET) != 0) {
    unset($_SESSION['cart'][array_keys($_GET)[0]]);
}

if (array_values($_GET)[0] == 'Заказать') {
    $_SESSION['order'] = 'create';

    redirect("index");
}

$cartArray = getCart();

render('cartTemplate', ['cartArray' => $cartArray, 'message' => $message]);
