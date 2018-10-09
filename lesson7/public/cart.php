<?php
header('Content-type: text/html, charset=utf-8');

include __DIR__ . '/../config/mainConfig.php';
include ENGIN_DIR . 'dbEngine.php';
include ENGIN_DIR . 'productsFunctions.php';
include ENGIN_DIR . 'render.php';
include ENGIN_DIR . 'base.php';
include ENGIN_DIR . 'orders.php';

session_start();
if (array_values($_GET)[0] == 'Удалить') {
//if (count($_GET) != 0) {
    unset($_SESSION['cart'][array_keys($_GET)[0]]);
}

if (array_values($_GET)[0] == 'Заказать') {
    $_SESSION['order'] = 'create';

    redirect("account.php");
}

$cartArray = getCart();

render('cartTemplate', ['cartArray' => $cartArray, 'message' => $message]);
