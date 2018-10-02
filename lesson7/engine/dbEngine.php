<?php
function getConnection(){
    $config = include CONFIG_DIR . "dbConfig.php";
    static $connection = null;
    if(is_null($connection)){
        $connection = mysqli_connect(
            $config['host'], $config['user'],$config['password'], $config['dbName']
        );
    }
    return $connection;
}

function executeQuery($sql){
    if (!$res = mysqli_query(getConnection(), $sql)){
        var_dump(mysqli_error(getConnection()));
    }
    return $res;
}

function returnQueryAll($sql){
    return mysqli_fetch_all(executeQuery($sql), MYSQLI_ASSOC);
}

function returnQueryOne($sql){
    return returnQueryAll($sql)[0];
}

function closeConnection(){
    return mysqli_close(getConnection());
}