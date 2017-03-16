<?php
/**
 * Created by PhpStorm.
 * User: vet
 * Date: 11.03.17
 * Time: 14:51
 */
require_once '../lib/flash_massages.php';
require_once '../lib/config.php';

$user_info = get_user_info();

$login = $_POST['login'];
$password = $_POST['password'];

foreach ($user_info as $res) {
    if ($res->password == md5($password) &&
        $res->login == $login
    ) {
        $_SESSION['auth_user'] = true;
        set_flash_message(8, $res->name_user);//Добро пожаловать!
        header('Location:/');
        die;
    }
}

if (empty($_POST['login']) || empty($_POST['password'])) {
    set_flash_message(6);//Вы должны заполнить все поля
    header('Location:/login/');
    die;
}

set_flash_message(7);//Ошибка логина или пароля
header('Location:/login/');
die;