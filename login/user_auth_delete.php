<?php
/**
 * Created by PhpStorm.
 * User: vet
 * Date: 15.03.17
 * Time: 19:24
 */
require_once '../lib/flash_massages.php';

if (!empty($_SESSION['auth_user'])) {
    unset($_SESSION['auth_user']);
    session_destroy();
    return header('Location:/');
}


