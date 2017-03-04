<?php
/**
 * Created by PhpStorm.
 * User: vet
 * Date: 01.03.17
 * Time: 19:30
 */
session_start();
include_once 'lib/db_connect.php';

$title = $_POST['title'];
$description = $_POST['description'];

$query = "INSERT INTO `posts` (title, description) VALUES ('$title' , '$description')";
$result =  mysqli_query($connect , $query);
if (!$result) {
    print_r(mysqli_error_list($connect));
} else {
    $_SESSION['message'] = 'Ваш пост сохранён ' . $title;
    return header('location:/');
}
//var_dump($result);