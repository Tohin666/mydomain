<?php

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $orderID = (int)$_POST['id'];

    deleteOrder($orderID);

    $markOrder = '#orderStatusID' . $orderID;

    echo json_encode(['success' => 'ok', 'markOrder' => $markOrder]);
}