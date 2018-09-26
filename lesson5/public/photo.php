<?php
header('Content-type: text/html; charset=utf-8');
include __DIR__ . '/../config/main.php';

$connect = mysqli_connect('localhost', 'root', '', 'myShopDB');

if ($id = $_GET['id']) {

    $id = (int) mysqli_escape_string($connect, $id);

    mysqli_query($connect, "UPDATE photos SET view_count = view_count + 1 WHERE id = {$id}");

    $sql = "SELECT * FROM photos WHERE id = {$id}";
    if (!$res = mysqli_query($connect, $sql)) {
        var_dump(mysqli_error($connect));
    }

//while ($row = mysqli_fetch_assoc($res)) {
//    var_dump($row);
//}

    $arrayPhoto = mysqli_fetch_all($res, MYSQLI_ASSOC)[0];
//    var_dump($arrayPhoto);

};

mysqli_close($connect);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gallery5 - <?= $arrayPhoto['name'] ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <a href="gallery.php">Вернуться в галерею</a><h1><?= $arrayPhoto['name'] ?></h1>
    <img src="<?= $arrayPhoto['url_big'] ?>" class="big-image" alt="<?= $arrayPhoto['name'] ?>">
    <h2>Количество просмотров: <?= $arrayPhoto['view_count'] ?></h2>
</div>


</body>
</html>