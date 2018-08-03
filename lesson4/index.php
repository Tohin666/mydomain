<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lesson4</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
echo '<h1>Lesson4</h1>';

include 'gallery.php';
?>
<form action="" method="post" enctype="multipart/form-data">
    <input type="file" name="loadedImage">
    <input type="hidden" name="MAX_FILE_SIZE" value="3000000">
    <h5>Максимальный размер 3МB</h5>
    <input type="submit" value="Загрузить фото">

    <?php
    if (isset($_FILES['loadedImage'])) {
        $uploadDir = './img/';
        $uploadFile = $uploadDir . basename($_FILES['loadedImage']['name']);

        echo '<pre>';

        if (move_uploaded_file($_FILES['loadedImage']['tmp_name'], $uploadFile)) {
            echo '<h3>Фото успешно загружено</h3>';

        } else {
            echo '<h3>Невозможно загрузить файл!</h3>';
        }

        echo '</pre>';
    }
    ?>

</form>
</body>
</html>
