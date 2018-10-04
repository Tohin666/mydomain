<?php
header('Content-type: text/html, charset=utf-8');

include __DIR__ . '/../config/mainConfig.php';
include ENGINE_DIR . 'dbEngine.php';
include ENGINE_DIR . 'users.php';
include ENGINE_DIR . 'render.php';
include ENGINE_DIR . 'base.php';

session_start();

if(!$user_id = $_SESSION['user_id']){
    redirect("login.php");
}

$user = getUserByID($_SESSION['user_id']);

render('accountTemplate', ['user' => $user]);
