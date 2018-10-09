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
