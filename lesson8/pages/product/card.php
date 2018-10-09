<?php
//header('Content-type: text/html, charset=utf-8');
//
//include __DIR__ . '/../config/mainConfig.php';
//include ENGINE_DIR . 'autoload.php';

if ($id = $_GET['id']) {
    $product = getProduct($id);
}

//if ($_GET['quantity']) {
//    session_start();
//    $_SESSION['cart'][$_GET['id']] += $_GET['quantity'];
//    redirect("card.php?id={$id}&massage=Товар добавлен в корзину");
//}
//
//$addToCartMassage = $_GET['massage'] ?? '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    session_start();
    $_SESSION['cart'][$_POST['id']] += $_POST['quantity'];
    $addToCartMassage = 'Товар добавлен в корзину';
    redirect($_SERVER['HTTP_REFERER'] . '&massage=Товар добавлен в корзину');
}

$addToCartMassage = $_GET['massage'] ?? '';

render('cardTemplate', ['product' => $product, 'addToCartMassage' => $addToCartMassage]);
