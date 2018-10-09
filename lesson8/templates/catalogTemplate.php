<div style="display: flex;">
    <?php foreach ($catalog as $product): ?>

        <div style="width: 200px; margin: 0 20px;">
            <a href="http://php1-2/lesson8/public/product/card?id=<?= $product['id'] ?>">
                <img src="http://php1-2/lesson8/public/img/small/<?= $product['photo'] ?>"
                     alt="<?= $product['name'] ?>">
                <h2><?= $product['name'] ?></h2>
            </a>
            <h3><?= $product['price'] ?> руб.</h3>
        </div>

    <?php endforeach; ?>
</div>
