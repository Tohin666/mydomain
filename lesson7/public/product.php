<?php
header('Content-type: text/html, charset=utf-8');

include __DIR__ . '/../config/mainConfig.php';
include ENGIN_DIR . 'dbEngine.php';
include ENGIN_DIR . 'productsFunctions.php';
include ENGIN_DIR . 'render.php';
include ENGIN_DIR . 'base.php';

if ($id = $_GET['id']) {
    $product = getProduct($id);
}

if ($_GET['quantity']) {
    session_start();
    $_SESSION['cart'][$_GET['id']] += $_GET['quantity'];
    redirect("product.php?id={$id}&massage=Товар добавлен в корзину");
}

$addToCartMassage = $_GET['massage'] ?? '';

render('productTemplate', ['product' => $product, 'addToCartMassage' => $addToCartMassage]);
