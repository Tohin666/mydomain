<?php

if ($id = $_GET['id']) {
    $product = getProduct($id);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    session_start();
    $_SESSION['cart'][$_POST['id']] += $_POST['quantity'];
    $addToCartMassage = 'Товар добавлен в корзину';
    redirect($_SERVER['HTTP_REFERER'] . '&massage=Товар добавлен в корзину');
}

$addToCartMassage = $_GET['massage'] ?? '';

render('cardTemplate', ['product' => $product, 'addToCartMassage' => $addToCartMassage]);
