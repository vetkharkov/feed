<?php
/**
 * Created by PhpStorm.
 * User: vet
 * Date: 04.03.17
 * Time: 0:41
 */
session_start();
include_once '../lib/db_connect.php';

$post_id = $_GET['id'];
$content = $_POST['content'];

$query = "INSERT INTO `comments` (post_id, content) VALUES ('$post_id' , '$content')";
$result =  mysqli_query($connect , $query);
if (!$result) {
    print_r(mysqli_error_list($connect));
} else {
    $_SESSION['message'] = ' Ваш комментарий сохранён ' . $content;
    return header("location:/show.php?id=$post_id");
}