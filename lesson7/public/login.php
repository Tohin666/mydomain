<?php
header('Content-type: text/html, charset=utf-8');

include __DIR__ . '/../config/mainConfig.php';
include ENGIN_DIR . 'dbEngine.php';
include ENGIN_DIR . 'users.php';
include ENGIN_DIR . 'render.php';
include ENGIN_DIR . 'base.php';

$message = '';

if ($_SERVER['REQUEST_METHOD'] == "POST" && $_POST['button'] == 'Войти') {
    $login = $_POST['login'];
    $password = $_POST['password'];

    if ($user = getUserByLoginPass($login, $password)) {
        session_start();
        $_SESSION['user_id'] = $user['id'];
        redirect("account.php");
    }
    $message = "Неправильный логин или пароль!";
}

if ($_SERVER['REQUEST_METHOD'] == "POST" && $_POST['button'] == 'Зарегистрироваться') {
    $name = $_POST['name'];
    $login = $_POST['login'];
    $password = $_POST['password'];

    if ($name && $login && $password) {
        registerUser($name, $login, $password);
        session_start();
        $user = getUserByLoginPass($login, $password);
        $_SESSION['user_id'] = $user['id'];
        redirect("account.php");
    } else {
        $message = 'Вы что-то забыли ввести...';
    }

}

render('loginTemplate', ['message' => $message]);
