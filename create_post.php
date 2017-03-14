<?php
/**
 * Created by PhpStorm.
 * User: vet
 * Date: 01.03.17
 * Time: 19:30
 */
//session_start();
include_once 'lib/db_queries.php';

$title = $_POST['title'];
$description = $_POST['description'];

$params = array(
    'title' => $title,
    'description' => $description);

//$result = create_record("posts", $params);//1-й вариант

$result = my_create_record("posts", $params);//2-й вариант

if (!$result) {
    print_r(mysqli_error_list($connect));
} else {
    set_flash_message(0, $title);//Ваш пост сохранён
    return header('location:/');
}

