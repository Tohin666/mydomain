<?php
header('Content-type: text/html, charset=utf-8');

include __DIR__ . '/../config/mainConfig.php';
include ENGINE_DIR . 'dbEngine.php';
include ENGINE_DIR . 'productsFunctions.php';
include ENGINE_DIR . 'render.php';

if ($id = $_GET['id']) {


    $product = getProduct($id);

//    $sql = "SELECT * FROM products WHERE id = {$id}";
//    $product = returnQueryOne($sql);
//
//    closeConnection();
}



//include TEMPLATES_DIR . 'productTemplate.php';
render('productTemplate', ['product' => $product]);