<?php
/**
 * Created by PhpStorm.
 * User: vet
 * Date: 15.03.17
 * Time: 18:51
 */
require_once 'flash_massages.php';

function check_user_auth()
{
    if (!user_exists()){
        set_flash_message(9);
        header('Location:/login/');
        die;
    }
}

function redirect_if_user_auth()
{
    if (user_exists()) {
        set_flash_message(10);
        header('Location:/');
        die;
    }
}

function user_exists(){
     return !!(key_exists('auth_user', $_SESSION) && $_SESSION['auth_user']);
}