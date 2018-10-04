<?php

function getUserByLoginPass($login, $password)
{
    return returnQueryOne("SELECT * FROM users WHERE login = '{$login}' AND password = '{$password}'");
}

function getUserByID($id)
{
    return returnQueryOne("SELECT * FROM users WHERE id = '{$id}'");
}

function registerUser($name, $login, $password)
{
    return executeQuery("INSERT INTO users (name, login, password) values ('{$name}','{$login}', '{$password}')");
}