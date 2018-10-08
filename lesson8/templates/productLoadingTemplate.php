<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Загрузка товаров</title>
    <link rel="stylesheet" href="../public/style.css">
</head>
<body>

<h1>Загрузка товаров</h1>

<div><?= $message ?></div>

<form action="" method="post" enctype="multipart/form-data">
    <input type="text" name="name" placeholder="Название"><br>
    <textarea name="description" id="" cols="30" rows="10" placeholder="Описание"></textarea><br>
    <input type="text" name="price" placeholder="Цена">
    <h5>Загрузить фото:</h5>
    <input type="hidden" name="MAX_FILE_SIZE" value="3000000">
    <input type="file" name="loadedImage">
    <h5>Максимальный размер 3МB</h5>
    <input type="submit" value="Готово">
</form>

<h2>Товары</h2>

<table class="cartTable">
    <tr>
        <td>Название</td>
        <td>Цена</td>
    </tr>

    <?php foreach ($products as $product): ?>
        <tr>
            <td><?= $product['name'] ?></td>
            <td><?= $product['price'] ?> руб.</td>
            <td>
                <form action=""><input type="submit" value="Удалить" name="<?= $product['id'] ?>"></form>
            </td>
        </tr>
    <?php endforeach; ?>
</table>


</body>
</html>