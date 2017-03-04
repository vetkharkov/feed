<?php
session_start();

function set_flash_message ($key , $message_text) {
    $_SESSION[$key] = $message_text;
}

function show_flash_message ($key) {
    $message = '';
    if (!empty($_SESSION[$key])) {
        $message = $_SESSION[$key];
        unset ($_SESSION[$key]);
    }
    return $message;
}

function flash_exists ($key) {
    !empty($_SESSION[$key]);
}

