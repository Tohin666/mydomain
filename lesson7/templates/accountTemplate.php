<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Account<?=' '.$user['login']?></title>
    <link rel="stylesheet" href="../public/style.css">
</head>
<body>
<a href="../public/catalog.php">Продолжить покупки</a>
<a href="../public/cart.php">Перейти в корзину</a>
<h1>Личный кабинет<?=' '.$user['login']?></h1>
<h2>Привет, <?=$user['name']?>!</h2>

</body>
</html>