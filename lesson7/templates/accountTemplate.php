<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Account<?= ' ' . $user['login'] ?></title>
    <link rel="stylesheet" href="../public/style.css">
</head>
<body>
<a href="../public/catalog.php">Продолжить покупки</a>
<a href="../public/cart.php">Перейти в корзину</a>
<h1>Личный кабинет</h1>
<h2><?= $user['login'] ?></h2>
<h3>Привет, <?= $user['name'] ?>!</h3>

<?php if ($createOrder): ?>
    <h2>Новый заказ</h2>
    <h3>Состав заказа</h3>

    <table class="cartTable">
        <tr>
            <td>Название</td>
            <td>Количество</td>
            <td>Цена</td>
            <td>Сумма</td>
        </tr>

        <?php
        $total = null;
        foreach ($cartArray as $product):
            $sum = $product['quantity'] * $product['price'];
            $total += $sum;
            ?>
            <tr>
                <td><?= $product['name'] ?></td>
                <td><?= $product['quantity'] ?></td>
                <td><?= $product['price'] ?> руб.</td>
                <td><?= $sum ?> руб.</td>
<!--                <td>-->
<!--                    <form action=""><input type="submit" value="Удалить" name="--><?//= $product['id'] ?><!--"></form>-->
<!--                </td>-->
            </tr>
        <?php endforeach; ?>
    </table>

    <h3>Сумма к оплате: <?= $total ?> руб.</h3>


    <form action="" method="post">
        <input type="text" name="fio" placeholder="ФИО получателя">
        <input type="text" name="address" placeholder="Адрес доставки">
        <input type="text" name="phone" placeholder="Телефон">
        <input type="submit" value="Оплатить">
    </form>
    <?= $message ?>
    <?php
//    $createOrder = false;
endif; ?>

</body>
</html>