<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Catalog</title>
</head>
<body>
<a href="../public/cart.php">Перейти в корзину</a>
<a href="../public/account.php">Личный кабинет</a>
<div style="display: flex;">
    <?php foreach ($catalog as $product): ?>

        <div style="width: 200px; margin: 0 20px;">
            <a href="../public/product.php?id=<?= $product['id'] ?>">
                <img src="../public/img/small/<?= $product['photo'] ?>" alt="<?= $product['name'] ?>">
                <h2><?= $product['name'] ?></h2>
            </a>
            <h3><?= $product['price'] ?> руб.</h3>
        </div>

    <?php endforeach; ?>
</div>

</body>
</html>