<?php
function getProduct($id) {
    $sql = "SELECT * FROM products WHERE id = {$id}";
    $product = returnQueryOne($sql);
    closeConnection();
    return $product;
}