<?php
/**
 * Created by PhpStorm.
 * User: vet
 * Date: 01.03.17
 * Time: 20:45
 */
session_start();
include_once 'lib/db_connect.php';

$id = $_GET['id'];
if (!empty($id)) {
    $query = "DELETE FROM `posts` WHERE id = $id";
    $result =  mysqli_query($connect , $query);
    if (!$result) {
        print_r(mysqli_error_list($connect));
    } else {
        $_SESSION['message'] = 'Ваш пост удалён';
        return header('location:/');
    }
} else {
    $_SESSION['message'] = 'Введите корректный id';
    return header('location:/');
}




