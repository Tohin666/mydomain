<?php

function getAssocResult($sql)
{
    $mysqli = mysqli_connect(HOST, USER, PASSWORD, DB, PORT);

    //Проверить, удалось ли соединиться с базой данных
    if(mysqli_connect_errno()){
        echo 'Не удалось установить соединение с БД. Ошибка: ' . mysqli_connect_error().PHP_EOL;
        exit(ERROR_CODE_CONNECT);
    }

    $result = mysqli_query($mysqli, $sql);
    $arrayResult = []; //Для уже полученных данных

    while ($row = mysqli_fetch_assoc($result))
    {
        array_push($arrayResult, $row);
    }
    mysqli_close($mysqli);
    return $arrayResult;
}