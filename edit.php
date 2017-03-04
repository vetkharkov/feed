<?php
/**
 * Created by PhpStorm.
 * User: vet
 * Date: 03.03.17
 * Time: 0:18
 */

session_start();
include_once 'lib/db_connect.php';

$id = $_GET['id'];
$title = $_POST['title'];
$description = $_POST['description'];

$query = "UPDATE `posts` SET title = '$title' , description = '$description' WHERE id = '$id'";
$result =  mysqli_query($connect , $query);
if (!$result) {
    print_r(mysqli_error_list($connect));
} else {
    $_SESSION['message'] = ' Ваш пост сохранён ' . $title;
    return header('location:/');
}
