<?php
header('Content-type: text/html, charset=utf-8');

include __DIR__ . '/../config/mainConfig.php';
include ENGINE_DIR . 'dbEngine.php';
include ENGINE_DIR . 'users.php';
include ENGINE_DIR . 'render.php';
include ENGINE_DIR . 'base.php';

$message = '';
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $login = $_POST['login'];
    $password = $_POST['password'];

    if($user = getUserByLoginPass($login, $password)){
        session_start();
        $_SESSION['user_id'] = $user['id'];
        redirect("account.php");
    }
    $message = "Неправильный логин или пароль!";
}

render('loginTemplate', ['message' => $message]);
