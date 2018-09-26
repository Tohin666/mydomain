<?php
header('Content-type: text/html; charset=utf-8');
include __DIR__ . '/../config/main.php';

$connect = mysqli_connect('localhost', 'root', '', 'myShopDB');

if ($id = $_GET['id']) {
    $id = (int) mysqli_escape_string($connect, $id);
    $sql = "SELECT * FROM products WHERE id = {$id}";
    if (!$res = mysqli_query($connect, $sql)) {
        var_dump(mysqli_error($connect));
    }

//while ($row = mysqli_fetch_assoc($res)) {
//    var_dump($row);
//}

    var_dump(mysqli_fetch_all($res, MYSQLI_ASSOC));
};

mysqli_close($connect);

echo '<a href = gallery.php>Галерея</a>';