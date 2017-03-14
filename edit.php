<?php
/**
 * Created by PhpStorm.
 * User: vet
 * Date: 03.03.17
 * Time: 0:18
 */

include_once 'lib/db_queries.php';

$id = $_GET['id'];
$title = $_POST['title'];
$description = $_POST['description'];

$params = array(
    'id' => $id,
    'title' => $title,
    'description' => $description);

//$result = update_record('posts', $params);//Исполнение Артёма

$result = my_update_record('posts', $params);//Мой вариант

if (!$result) {
    print_r(mysqli_error_list($connect));
} else {
    set_flash_message(0, $title);//Ваш пост сохранён
    return header('location:/');
}

