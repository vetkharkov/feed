<?php
/**
 * Created by PhpStorm.
 * User: vet
 * Date: 04.03.17
 * Time: 0:41
 */
//session_start();
include_once '../lib/db_queries.php';

$post_id = $_GET['id'];
$content = $_POST['content'];

$params = array(
    'post_id' => $post_id,
    'content' => $content);

//$result = create_record("comments", $params);//1-й вариант

$result = my_create_record("comments", $params);//2-й вариант

if (!$result) {
    print_r(mysqli_error_list($connect));
} else {
    set_flash_message(1, $content);//Ваш комментарий сохранён
    return header("location:/show.php?id=$post_id");
}






//create_record("comments", "post_id", $post_id, "content", $content);