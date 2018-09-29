<?php
function getConnection(){
    $config = include CONF_DIR . "dbConfig.php";
    static $connection = null;
    if(is_null($connection)){
        $connection = mysqli_connect(
            $config['host'], $config['user'],$config['password'], $config['dbName']
        );
    }
    return $connection;
}

function executeQuery($sql){
    return mysqli_query(getConnection(), $sql);
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