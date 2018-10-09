<?php

$userID = $_SESSION['user_id'];

if (!$userID) {
    redirect("login");
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
        //Добавил в таблицу сумму заказа $cartArray[0]
        $createdOrderID = createOrder($userID, $fio, $address, $phone, $cartArray[0]);

        addProductsToOrder($createdOrderID, $cartArray);

        $_SESSION['cart'] = [];
        $_SESSION['order'] = null;

        redirect("index");

    } else {
        $message = 'Вы что-то забыли ввести...';
    }
}

$orders = getOrders($userID);

render(
    'accountTemplate',
    [
        'user' => $user,
        'createOrder' => $createOrder,
        'message' => $message,
        'cartArray' => $cartArray,
        'orders' => $orders
    ]
);
