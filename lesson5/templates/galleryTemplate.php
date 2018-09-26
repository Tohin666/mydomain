<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gallery5</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h1>Gallery5</h1>

<div id="gallery" class="gallery">
    <?php foreach ($gallery as $image):
//        $bigPictureName = substr_replace($image, '', strrpos($image, '_small'), 6);
        ?>
        <a href="photo.php?id=<?= $image['id'] ?>"><img src="<?= $image['url_small'] ?>"></a>
    <?php endforeach; ?>
</div>

<form action="" method="post" enctype="multipart/form-data">
    <input type="file" name="loadedImage">
    <!--    <input type="hidden" name="MAX_FILE_SIZE" value="3000000">-->
    <h5>Максимальный размер 3МB</h5>
    <input type="submit" value="Загрузить фото">


</form>
</body>
</html>