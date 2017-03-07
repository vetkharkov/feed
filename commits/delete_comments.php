<?php
/**
 * Created by PhpStorm.
 * User: vet
 * Date: 03.03.17
 * Time: 23:56
 */
session_start();
//-------------------Было----------------------------
//include_once '../lib/db_connect.php';
//$id = $_GET['id'];
//$post_id = $_GET['post_id'];
//if (!empty($id)) {
//    $query = "DELETE FROM `comments` WHERE id = $id";
//    $result =  mysqli_query($connect , $query);
//    if (!$result) {
//        print_r(mysqli_error_list($connect));
//    } else {
//        $_SESSION['message'] = ' Ваш комментарий удалён';
//        return header("location:/show.php?id=$post_id");
//    }
//} else {
//    $_SESSION['message'] = ' Введите корректный id';
//    return header("location:/show.php?id=$post_id");
//}
////----------------Стало---------------------------
include_once '../lib/db_queries.php';

$id = $_GET['id'];
$post_id = $_GET['post_id'];

if (!empty($id)) {
    if (!delete_record('comments', 'id', $id)) {
        $_SESSION['message'] = ' Ошибка удаления';
    } else {
        $_SESSION['message'] = ' Ваш комментарий удалён';
    }
} else {
    $_SESSION['message'] = ' Введите корректный id';
}
return header("location:/show.php?id=$post_id");
