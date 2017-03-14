<?php
session_start();

function set_flash_message($key, $param = '')
{
    $message_text = [
        ' Ваш пост сохранён ',
        ' Ваш комментарий сохранён ',
        ' Ваш комментарий удалён',
        ' Ваш пост удалён',
        ' Ошибка удаления',
        ' Введите корректный id',
        ' Вы должны заполнить все поля',
        ' Ошибка логина или пароля',
        ' Спасибо за вход!'
    ];
    $_SESSION['message'] = $message_text[$key] . $param;
}


function show_flash_message($key)
{
    $message = '';
    if (!empty($_SESSION[$key])) {
        $message = $_SESSION[$key];
        unset ($_SESSION[$key]);
    }
    return $message;
}

function flash_exists($key)
{
    return !empty($_SESSION[$key]);

}

