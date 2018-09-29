<?php
function getCatalog() {
    $sql = "SELECT * FROM products";
    $catalog = returnQueryAll($sql);
    closeConnection();
    return $catalog;
}