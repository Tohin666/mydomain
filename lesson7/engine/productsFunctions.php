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
    $id = (int)mysqli_escape_string(getConnection(), $id);

    $sql = "SELECT * FROM products where id = {$id}";
    $product = returnQueryOne($sql);
    closeConnection();
    return $product;
}

function getProducts($ids)
{

    $sql = "SELECT * FROM products where id IN ({$ids})";
    $products = returnQueryAll($sql);
    closeConnection();
    return $products;
}

function getCart()
{
    $sessionCart = $_SESSION['cart'];
    if ($sessionCart) {
        $ids = implode(',', array_keys($sessionCart));
        $products = getProducts($ids);
        $cartArray = [];
        foreach ($products as $product) {
            $product['quantity'] = $sessionCart[$product['id']];
            $cartArray[] = $product;
        }
        return $cartArray;
    } else {
        return null;
    }
}