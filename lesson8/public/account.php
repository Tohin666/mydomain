<?php
header('Content-type: text/html, charset=utf-8');

include __DIR__ . '/../config/mainConfig.php';
include ENGINE_DIR . 'dbEngine.php';
include ENGINE_DIR . 'users.php';
include ENGINE_DIR . 'render.php';
include ENGINE_DIR . 'base.php';
include ENGINE_DIR . 'orders.php';
include ENGINE_DIR . 'productsFunctions.php';

session_start();

$userID = $_SESSION['user_id'];

if (!$userID) {
    redirect("login.php");
}

$user = getUserByID($userID);

$createOrder = false;
if ($_SESSION['order'] == 'create') {
    $createOrder = true;
    $cartArray = getCart();
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $fio = $_POST['fio'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];

    if ($fio && $address && $phone) {

        createOrder($userID, $fio, $address, $phone);
//        var_dump(searchCreatedOrder($userID));

//        redirect("account.php");
//        $message = 'Заказ передан в работу';
    } else {
        $message = 'Вы что-то забыли ввести...';
    }

}


render('accountTemplate',
    ['user' => $user, 'createOrder' => $createOrder, 'message' => $message, 'cartArray' => $cartArray]);
