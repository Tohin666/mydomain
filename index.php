<?php
$scanDir = array_filter(scandir('./'), function ($item) {
    return $item != '.git' && $item != '.idea' && $item != '.' && $item != '..' && $item != 'index.php';
});
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>php1-2</title>
</head>
<body>
<h1>php1-2</h1>

<ul>
    <?php foreach ($scanDir as $item): ?>

    <li><a href="<?= $item ?>"><?= $item ?></a></li>

    <?php endforeach; ?>
</ul>

</body>
</html>