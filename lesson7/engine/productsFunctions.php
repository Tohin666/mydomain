<?php
function getCatalog() {
    $sql = "SELECT * FROM products";
    $catalog = returnQueryAll($sql);
    closeConnection();
    return $catalog;
}

function getProduct($id) {
    // защита от sql-инъекций
    $id = (int) mysqli_escape_string(getConnection(), $id);

    $sql = "SELECT * FROM products where id = {$id}";
    $product = returnQueryOne($sql);
    closeConnection();
    return $product;
}