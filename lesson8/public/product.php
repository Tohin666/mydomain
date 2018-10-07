<?php
header('Content-type: text/html, charset=utf-8');

include __DIR__ . '/../config/mainConfig.php';
include ENGINE_DIR . 'dbEngine.php';
include ENGINE_DIR . 'productsFunctions.php';
include ENGINE_DIR . 'render.php';
include ENGINE_DIR . 'base.php';

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
