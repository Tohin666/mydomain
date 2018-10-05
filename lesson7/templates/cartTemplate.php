<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cart</title>
    <link rel="stylesheet" href="../public/style.css">
</head>
<body>
<a href="../public/catalog.php">Продолжить покупки</a>
<a href="../public/account.php">Личный кабинет</a>
<h1>Корзина</h1>

<?php if ($cartArray):
    $total = null;
    ?>
    <table class="cartTable">
        <tr>
            <td>Название</td>
            <td>Количество</td>
            <td>Цена</td>
            <td>Сумма</td>
        </tr>

        <?php foreach ($cartArray as $product):
            $sum = $product['quantity'] * $product['price'];
            $total += $sum;
            ?>
            <tr>
                <td><?= $product['name'] ?></td>
                <td><?= $product['quantity'] ?></td>
                <td><?= $product['price'] ?> руб.</td>
                <td><?= $sum ?> руб.</td>
                <td>
                    <form action=""><input type="submit" value="Удалить" name="<?= $product['id'] ?>"></form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <h3>Сумма к оплате: <?= $total ?> руб.</h3>
    <form action=""><input type="submit" value="Заказать" name="button"></form>
<!--    <button onclick="document.getElementById('orderForm').style.display = 'block'">Заказать</button>-->
<!--    <br><br>-->
<!--    <form action="" method="post" style="display: none" id="orderForm">-->
<!--        <input type="text" name="fio" placeholder="ФИО получателя">-->
<!--        <input type="text" name="address" placeholder="Адрес доставки">-->
<!--        <input type="text" name="phone" placeholder="Телефон">-->
<!--        <input type="submit" value="Оплатить">-->
<!--    </form>-->
<!--    --><?//= $message ?>
<?php else:
    echo 'Корзина пуста';
endif;
?>

</body>
</html>