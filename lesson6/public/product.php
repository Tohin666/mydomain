<?php
header('Content-type: text/html, charset=utf-8');

include __DIR__ . '/../config/mainConfig.php';
include ENGINE_DIR . 'dbEngine.php';

if ($id = $_GET['id']) {
    $sql = "SELECT * FROM products WHERE id = {$id}";
    $product = returnQueryOne($sql);

    closeConnection();
}



include TEMPLATES_DIR . 'productTemplate.php';