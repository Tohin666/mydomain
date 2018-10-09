<?php
function createOrder($userID, $fio, $address, $phone, $sum)
{
    $sql = "INSERT INTO orders (user_id, fio, address, phone, status, sum) VALUES ({$userID}, '{$fio}', '{$address}', '{$phone}', 'создан', {$sum})";
    $id = executeQueryReturnID($sql);
    closeConnection();
    return $id;
}

function getOrders($userID) {
    $sql = "SELECT * FROM orders WHERE user_id = {$userID} ORDER BY id DESC ";
    $orders = returnQueryAll($sql);
    foreach ($orders as $orderIndex => $order) {
        $sql = "SELECT * FROM order_list WHERE order_id = {$order['id']}";
        $products = returnQueryAll($sql);
        foreach ($products as $productIndex => $product) {
            $sql = "SELECT * FROM products WHERE id = {$product['product_id']}";
            $productData = returnQueryOne($sql);
            foreach ($productData as $key => $value)
            $products[$productIndex][$key] = $value;
        }
        $orders[$orderIndex]['products'] = $products;
    }
    closeConnection();
    return $orders;
}

function deleteOrder($orderID)
{
    $sql = "UPDATE orders SET status = 'удален' WHERE id = {$orderID}";
    executeQuery($sql);
    closeConnection();
}