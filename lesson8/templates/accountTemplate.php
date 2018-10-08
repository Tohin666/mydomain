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

        <?php foreach ($cartArray as $product):
            if (gettype($product) == 'array'): ?>
                <tr>
                    <td><?= $product['name'] ?></td>
                    <td><?= $product['quantity'] ?></td>
                    <td><?= $product['price'] ?> руб.</td>
                    <td><?= $product['sum'] ?> руб.</td>
                </tr>
            <?php endif; endforeach; ?>
    </table>

    <h3>Сумма к оплате: <?= $cartArray[0] ?> руб.</h3>

    <form action="" method="post">
        <input type="text" name="fio" placeholder="ФИО получателя">
        <input type="text" name="address" placeholder="Адрес доставки">
        <input type="text" name="phone" placeholder="Телефон">
        <input type="submit" value="Оплатить">
    </form>
    <?= $message ?>
<?php endif; ?>


<?php if ($orders): ?>
    <h2>Заказы:</h2>

    <?php foreach ($orders as $order): ?>
        <hr>
        <h3>Заказ №<?= $order['id'] ?></h3>
        <h4>Статус: <?= $order['status'] ?></h4>
        <h3>Состав заказа:</h3>

        <table class="cartTable">
            <tr>
                <td>Название</td>
                <td>Количество</td>
                <td>Цена</td>
                <td>Сумма</td>
            </tr>

            <?php foreach ($order['products'] as $product): ?>
                <tr>
                    <td><?= $product['name'] ?></td>
                    <td><?= $product['quantity'] ?></td>
                    <td><?= $product['price'] ?> руб.</td>
                    <td><?= $product['sum'] ?> руб.</td>
                </tr>
            <?php endforeach; ?>
        </table>

        <h3>Сумма заказа: <?= $order['sum'] ?> руб.</h3>

        <ul>
            <li>Ф.И.О. получателя: <?= $order['fio'] ?></li>
            <li>Адрес доставки: <?= $order['address'] ?></li>
            <li>Телефон: <?= $order['phone'] ?></li>
        </ul>

    <?php endforeach;
endif; ?>

</body>
</html>