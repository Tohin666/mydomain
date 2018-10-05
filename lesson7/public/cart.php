<?php
header('Content-type: text/html, charset=utf-8');

include __DIR__ . '/../config/mainConfig.php';
include ENGINE_DIR . 'dbEngine.php';
include ENGINE_DIR . 'productsFunctions.php';
include ENGINE_DIR . 'render.php';
include ENGINE_DIR . 'base.php';

session_start();
if (array_values($_GET)[0] == 'Удалить') {
//if (count($_GET) != 0) {
    unset($_SESSION['cart'][array_keys($_GET)[0]]);
}

if (array_values($_GET)[0] == 'Заказать') {

    redirect("account.php");
}

//if ($_SERVER['REQUEST_METHOD'] == "POST") {
//    var_dump($_POST);
//    $fio = $_POST['fio'];
//    $address = $_POST['address'];
//    $phone = $_POST['phone'];
//
//    if ($fio && $address && $phone) {
//        addUserInfo($fio, $address, $phone);
////        registerUser($name, $login, $password);
////        $user = getUserByLoginPass($login, $password);
////        $_SESSION['user_id'] = $user['id'];
////        redirect("account.php");
//    } else {
//        $message = 'Вы что-то забыли ввести...';
//    }
//
//}

$cartArray = getCart();

render('cartTemplate', ['cartArray' => $cartArray, 'message' => $message]);
