<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    $photo = uploadFile(PUBLIC_DIR . 'img/', 'loadedImage');

    if ($name && $description && $price) {

        createProduct($name, $description, $price, $photo);

        redirect("productLoading");

    } else {
        $message = 'Вы что-то забыли ввести...';
    }
}

if (array_values($_GET)[0] == 'Удалить') {
    deleteProduct(array_keys($_GET)[0]);
    redirect("productLoading");
}

$products = getCatalog();

render('productLoadingTemplate', ['products' => $products, 'message' => $message]);
