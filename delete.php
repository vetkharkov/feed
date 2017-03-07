<?php
/**
 * Created by PhpStorm.
 * User: vet
 * Date: 01.03.17
 * Time: 20:45
 */
session_start();
include_once 'lib/db_queries.php';

$id = $_GET['id'];
if (!empty($id)) {
    if (!delete_record('posts', 'id', $id)) {
        $_SESSION['message'] = ' Ошибка удаления';
    } else {
        $_SESSION['message'] = ' Ваш пост удалён';
    }
} else {
    $_SESSION['message'] = ' Введите корректный id';
}
return header('location:/');




