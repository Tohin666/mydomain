<?php
function getGallery() {

    $connect = mysqli_connect('localhost', 'root', '', 'myShopDB');

    $sql = "SELECT * FROM photos ORDER BY view_count DESC ";

    if (!$res = mysqli_query($connect, $sql)) {
        var_dump(mysqli_error($connect));
    }

    $arrayPhoto = mysqli_fetch_all($res, MYSQLI_ASSOC);

    mysqli_close($connect);

    return $arrayPhoto;
}

//function getGallery() {
//    return array_filter(
//        scandir(PUBLIC_DIR . 'img/small'),
//        function ($item) {
//            return !is_dir(PUBLIC_DIR . 'img/small/' . $item);
//        }
//    );
//}