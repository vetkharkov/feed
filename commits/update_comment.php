<?php
/**
 * Created by PhpStorm.
 * User: vet
 * Date: 04.03.17
 * Time: 1:39
 */

include_once '../lib/db_queries.php';

$id = $_GET['id'];
$post_id = $_GET['post_id'];
$content = $_POST['content'];

$params = array(
    'id' => $id,
    'post_id' => $post_id,
    'content' => $content);

//$result = update_record('comments', $params);//Исполнение Артёма

$result = my_update_record('comments', $params);//Мой вариант

if (!$result) {
    print_r(mysqli_error_list($connect));
} else {
    set_flash_message(1, $content);//Ваш комментарий сохранён
    return header("location:/show.php?id=$post_id");
}


