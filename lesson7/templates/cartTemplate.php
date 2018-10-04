<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cart</title>
</head>
<body>
<a href="../public/catalog.php">Продолжить покупки</a>
<h1>Корзина</h1>

<?php
if ($_SESSION['cart']) {
    var_dump($_SESSION['cart']);
    foreach ($_SESSION['cart'] as $product) {
        echo $product;
    }
} else {
    echo 'Корзина пуста';
}
var_dump($cartArray);
?>

<table>
    <tr>
        <td></td>
    </tr>
</table>

<a href="../public/img/<?= $product['photo'] ?>" target="_blank">
    <img src="../public/img/<?= $product['photo'] ?>" alt="<?= $product['name'] ?>" style="width: 400px"></a>
<p style="width: 600px"><?= $product['description'] ?></p>
<h2><?= $product['price'] ?> руб.</h2>
<form action="">
    <label>Количество:<input type="number" value="1" name="quantity"></label>
    <input type="hidden" name="id" value="<?= $product['id'] ?>">
    <input type="submit" value="Купить">
</form>

</body>
</html>