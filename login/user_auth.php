<?php
/**
 * Created by PhpStorm.
 * User: vet
 * Date: 11.03.17
 * Time: 14:51
 */
require_once '../lib/flash_massages.php';
require_once '../lib/config.php';

if(empty($_POST['login']) || empty($_POST['password'])){
    set_flash_message(6);//Вы должны заполнить все поля
    return header('Location:/login');
}

$user_info = get_user_info();
$login = $_POST['login'];
$password = $_POST['password'];


if($user_info['password'] == md5($password) &&
   $user_info['login'] == $login) {
    $_SESSION['auth_user'] = true;
    set_flash_message(8);//Спасибо за вход!
    return header('Location:/');
} else {
    set_flash_message(7);//Ошибка логина или пароля
    return header('Location:/login');
}