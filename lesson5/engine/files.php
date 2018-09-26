<?php
/**
 * Функция загружает изображение и создает его уменьшенную копию.
 * @param string $uploadDir - Путь к директории с изображениями.
 * @param string $attributeName - Имя атрибута загружаемого изображения.
 */
function uploadFile($uploadDir, $attributeName = 'file')
{
    // Проверяем, есть ли файл с таким атрибутом.
    if (isset($_FILES[$attributeName])) {
        // Сохраняем размер изображения, чтобы передать в базу данных.
        $fileSize = $_FILES[$attributeName]['size'];

        // Создаем директорию для загрузки, если ее не существует.
        if (!file_exists($uploadDir)) {
            mkdir($uploadDir);
        }

        // Берем имя файла из атрибутов.
        $filename = basename($_FILES[$attributeName]['name']);
        // Отделяем расширение файла.
        $fileExtension = strrchr($filename, '.');
        // Отделяем имя файла от расширения.
        $filenameWithoutExtension =
            substr_replace($filename, '', -strlen($fileExtension), strlen($fileExtension));
        // Собираем полный путь к файлу.
        $filenameWithPath = $uploadDir . $filename;

        // Если файл с таким имененем уже существует, то добавляем к имени уникальный ID.
        if (file_exists($filenameWithPath)) {
            $filenameWithoutExtension .= uniqid();
            $filename = $filenameWithoutExtension . $fileExtension;
            $filenameWithPath = $uploadDir . $filename; //так проще чем:
//                $filenameWithPath = substr_replace($filenameWithPath, uniqid(),
//                    strrpos($filenameWithPath, $fileExtension), 0);
        }

//        echo '<pre>';

        // Проверяем, является ли файл изображением, и он не более 3MB, и пробуем его переместить.
        if (substr($_FILES[$attributeName]['type'], 0, 5) == 'image' &&
            $_FILES[$attributeName]['size'] <= 3000000 &&
            move_uploaded_file($_FILES[$attributeName]['tmp_name'], $filenameWithPath)) {

            // Не знаю пока как реализовать.
            // echo '<h3>Фото успешно загружено</h3>';

            // Создаем папку для уменьшенных копий изображений, если ее не существует.
            $smallImageDir = PUBLIC_DIR . 'img/small/';
            if (!file_exists($smallImageDir)) {
                mkdir($smallImageDir);
            }

            // Создаем полный путь до уменьшенного изображения.
            $smallFilenameWithPath = $smallImageDir . $filenameWithoutExtension . '_small' . $fileExtension;
            // Уменьшаем изображение.
            img_resize($filenameWithPath, $smallFilenameWithPath, 200, 300);



            // Отправляем информацию о картике в базу данных.
            $connect = mysqli_connect('localhost', 'root', '', 'myShopDB');
            var_dump($filenameWithPath, $smallFilenameWithPath);

            $sql = "INSERT INTO photos (name, size, url_big, url_small, view_count)
                    VALUES ('{$filename}', '{$fileSize}', '{$filenameWithPath}', '{$smallFilenameWithPath}', 0)";

            if (!$res = mysqli_query($connect, $sql)) {
                var_dump(mysqli_error($connect));
            }

            mysqli_close($connect);

        } // else {
        // Не знаю пока как реализовать.
        // echo '<h3>Невозможно загрузить файл!</h3>';
        //}

//        echo '</pre>';
    }
}