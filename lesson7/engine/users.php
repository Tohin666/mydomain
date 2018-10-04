<?php

function getUserByLoginPass($login, $password){
    return returnQueryOne("SELECT * FROM users WHERE login = '{$login}' AND password = '{$password}'");
}

function getUserByID($id){
    return returnQueryOne("SELECT * FROM users WHERE id = '{$id}'");
}