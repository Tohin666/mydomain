<?php
function createOrder($userID, $fio, $address, $phone)
{
    $sql = "INSERT INTO orders (user_id, fio, address, phone, status) VALUES ({$userID}, '{$fio}', '{$address}', '{$phone}', 'created')";
    $order = executeQuery($sql);
    closeConnection();
    return $order;
}
//function createOrderList() {
//
//}
//function searchCreatedOrder($userID) {
//    return returnQueryOne("SELECT * FROM orders WHERE user_id = {$userID} AND status = 'created'");
//}