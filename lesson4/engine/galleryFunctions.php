<?php
function getGallery() {
    return array_filter(
        scandir(PUBL_DIR . 'img/small'),
        function ($item) {
            return !is_dir(PUBL_DIR . 'img/small/' . $item);
        }
    );
}