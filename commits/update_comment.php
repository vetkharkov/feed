<?php
/**
 * Created by PhpStorm.
 * User: vet
 * Date: 04.03.17
 * Time: 1:39
 */
session_start();
include_once '../lib/db_connect.php';

$id = $_GET['id'];
$post_id = $_GET['post_id'];

$content = $_POST['content'];

$query = "UPDATE `comments` SET post_id = '$post_id' , content = '$content' WHERE id = '$id'";
$result =  mysqli_query($connect , $query);
if (!$result) {
    print_r(mysqli_error_list($connect));
} else {
    $_SESSION['message'] = ' Ваш комментарий сохранён ' . $content;
    return header("location:/show.php?id=$post_id");
}