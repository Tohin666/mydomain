<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $product['name'] ?></title>
</head>
<body>
<a href="../public/catalog.php">Вернуться в каталог</a>
<h1><?= $product['name'] ?></h1>
<a href="../public/img/<?= $product['photo'] ?>" target="_blank">
    <img src="../public/img/<?= $product['photo'] ?>" alt="<?= $product['name'] ?>" style="width: 400px"></a>
<p style="width: 600px"><?= $product['description'] ?></p>
<h2><?= $product['price'] ?> руб.</h2>
</body>
</html>