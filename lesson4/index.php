<?php
include __DIR__ . '/funcImgResize.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_FILES['loadedImage'])) {

        $uploadDir = __DIR__ . '/img/big/';
        if (!file_exists($uploadDir)) {
            mkdir($uploadDir);
        }

        $filename = basename($_FILES['loadedImage']['name']);
        $fileExtension = strrchr($filename, '.');
        $filenameWithoutExtension =
            substr_replace($filename, '', -strlen($fileExtension), strlen($fileExtension));
        $filenameWithPath = $uploadDir . $filename;

        if (file_exists($filenameWithPath)) {
            $filenameWithoutExtension .= uniqid();
            $filename = $filenameWithoutExtension . $fileExtension;
            $filenameWithPath = $uploadDir . $filename; //так проще чем:
//                $filenameWithPath = substr_replace($filenameWithPath, uniqid(),
//                    strrpos($filenameWithPath, $fileExtension), 0);
        }

        echo '<pre>';

        if (substr($_FILES['loadedImage']['type'], 0, 5) == 'image' &&
            $_FILES['loadedImage']['size'] <= 3000000 &&
            move_uploaded_file($_FILES['loadedImage']['tmp_name'], $filenameWithPath)) {

            echo '<h3>Фото успешно загружено</h3>';

            $smallImageDir = __DIR__ . '/img/small/';
            if (!file_exists($smallImageDir)) {
                mkdir($smallImageDir);
            }

            $smallFilenameWithPath = $smallImageDir . $filenameWithoutExtension . '_small' . $fileExtension;
            img_resize($filenameWithPath, $smallFilenameWithPath, 200, 300);

        } else {
            echo '<h3>Невозможно загрузить файл!</h3>';
        }

        echo '</pre>';
    }
}

?>
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

include __DIR__ . '/gallery.php';
?>
<form action="" method="post" enctype="multipart/form-data">
    <input type="file" name="loadedImage">
    <!--    <input type="hidden" name="MAX_FILE_SIZE" value="3000000">-->
    <h5>Максимальный размер 3МB</h5>
    <input type="submit" value="Загрузить фото">



</form>
</body>
</html>
