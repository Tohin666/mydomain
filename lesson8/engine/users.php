<?php

//function getUserByLoginPass($login, $password)
//{
//    return returnQueryOne("SELECT * FROM users WHERE login = '{$login}' AND password = '{$password}'");
//}
//
//function getUserByID($id)
//{
//    return returnQueryOne("SELECT * FROM users WHERE id = '{$id}'");
//}
//
//function registerUser($name, $login, $password)
//{
//    return executeQuery("INSERT INTO users (name, login, password) values ('{$name}','{$login}', '{$password}')");
//}

function getUserByLoginPass($login, $password)
{
    $sql = "SELECT * FROM users WHERE login = '{$login}' AND password = '{$password}'";
    $user = returnQueryOne($sql);
    closeConnection();
    return $user;
}

function getUserByID($id)
{
    $sql = "SELECT * FROM users WHERE id = '{$id}'";
    $user = returnQueryOne($sql);
    closeConnection();
    return $user;
}

function registerUser($name, $login, $password)
{
    $sql = "INSERT INTO users (name, login, password) values ('{$name}','{$login}', '{$password}')";
    $user = executeQuery($sql);
    closeConnection();
    return $user;
}