<?php
/**
 * Функция должна формировать дерево файлов и папок в виде многоуровневого списка.
 * @param string $topDir Верхняя директория, с которой нужно начинать выводить структуру.
 * @return string Возвращает html-список фалов и папок.
 */
function displayDirTree($topDir = './', $dirTree = '')
{
    echo '!!Новая рекурсия!!<br>';
    var_dump($dirTree);

//    // Если html-список еще не начинали формировать, то объявляем пустую переменную.
//    if (!isset($dirTree)) {
//        $dirTree = '';
//    }

    // Сканируем текущую директорию и получаем массив файлов и папок за исключением "." и ".."
    $dirsAndFiles = array_filter(scandir($topDir), function ($item) {
        return $item != '.' && $item != '..';
    });
    // Получаем массив только папок.
    $dirs = array_filter($dirsAndFiles, function ($item) {
        return is_dir($item);
    });

    // Получаем массив только файлов.
    $files = array_filter($dirsAndFiles, function ($item) {
        return !is_dir($item);
    });

    // Если в текущей директории есть папки или файлы, то начинаем формировть список.
    if ($dirs != [] || $files != []) {
//        var_dump($dirs);
//        var_dump($files);
        $dirTree .= '<ul>';


        // Перебираем папки.
        foreach ($dirs as $dir) {
//        $dirTree .= '<li><a href="' . $dir . '"><b>[' . $dir . ']</b></a></li>';

            // Формируем строку списка с названием папки
            $dirTree .= '<li><b>[' . $dir . ']</b></li>';

            // Проверяем каждую папку на наличие в ней других файлов и папок с помощью рекурсии.
            if ($isFilesOrFolders = displayDirTree($dir, $dirTree)) {
                var_dump($isFilesOrFolders);
                // Если рекурсия вернула еще файлы и/или папки, то вставляем их в текущую позицию списка (папку).
                $dirTree .= $isFilesOrFolders;
            }
        }

        // Перебираем файлы.
        foreach ($files as $file) {
            $dirTree .= '<li><a href="' . $file . '" target = _blank>' . $file . '</a></li>';
        }

        $dirTree .= '</ul>';
    }




    return $dirTree;
}