<!--<!doctype html>-->
<!--<html lang="en">-->
<!--<head>-->
<!--    <meta charset="UTF-8">-->
<!--    <meta name="viewport"-->
<!--          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">-->
<!--    <meta http-equiv="X-UA-Compatible" content="ie=edge">-->
<!--    <title>--><?//= $product['name'] ?><!--</title>-->
<!--</head>-->
<!--<body>-->

<h1><?= $product['name'] ?></h1>
<a href="../img/<?= $product['photo'] ?>" target="_blank">
    <img src="../img/<?= $product['photo'] ?>" alt="<?= $product['name'] ?>" style="width: 400px"></a>
<p style="width: 600px"><?= $product['description'] ?></p>
<h2><?= $product['price'] ?> руб.</h2>

<form action="" method="post">
    <label>Количество:<input type="number" value="1" name="quantity"></label>
    <input type="hidden" name="id" value="<?= $product['id'] ?>">
    <input type="submit" value="Купить">
</form>
<?= $addToCartMassage ?>

<!--</body>-->
<!--</html>-->