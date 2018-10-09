<?php

if (array_values($_GET)[0] == 'Удалить') {
    unset($_SESSION['cart'][array_keys($_GET)[0]]);
}

if (array_values($_GET)[0] == 'Заказать') {
    $_SESSION['order'] = 'create';

    redirect("index");
}

$cartArray = getCart();

render('cartTemplate', ['cartArray' => $cartArray, 'message' => $message]);
