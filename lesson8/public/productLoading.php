<?php
header('Content-type: text/html, charset=utf-8');

include __DIR__ . '/../config/mainConfig.php';
include ENGINE_DIR . 'dbEngine.php';
include ENGINE_DIR . 'productsFunctions.php';
include ENGINE_DIR . 'render.php';
include ENGINE_DIR . 'base.php';
include ENGINE_DIR . 'files.php';
include VENDOR_DIR . 'funcImgResize.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    $photo = uploadFile(PUBL_DIR . 'img/', 'loadedImage');

    if ($name && $description && $price) {

        createProduct($name, $description, $price, $photo);

        redirect("productLoading.php");

    } else {
        $massage = 'Вы что-то забыли ввести...';
    }
}


if (array_values($_GET)[0] == 'Удалить') {
    deleteProduct(array_keys($_GET)[0]);
}

$products = getCatalog();

render('productLoadingTemplate', ['products' => $products, 'massage' => $massage]);
