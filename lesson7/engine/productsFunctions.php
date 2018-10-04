<?php
function getCatalog()
{
    $sql = "SELECT * FROM products";
    $catalog = returnQueryAll($sql);
    closeConnection();
    return $catalog;
}

function getProduct($id)
{
    // защита от sql-инъекций
//    $id = (int)mysqli_escape_string(getConnection(), $id); // ломает корзину

    $sql = "SELECT * FROM products where id = {$id}";
    $product = returnQueryOne($sql);
    closeConnection();
    return $product;
}

function getCart()
{
//    if ($_SESSION['cart']) {
//        var_dump($_SESSION['cart']);
    $cartArray = [];
    foreach ($_SESSION['cart'] as $productID => $quantity) {
        var_dump($productID, $quantity);
        $product = getProduct($productID);
        var_dump($product);
        $product['quantity'] = $quantity;
        var_dump($product);
        $cartArray[] = $product;
        var_dump($cartArray);
    }
    var_dump($cartArray);
    return $cartArray;
//    } else {
//        echo 'Корзина пуста';
//    }
}