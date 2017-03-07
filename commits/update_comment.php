<?php
/**
 * Created by PhpStorm.
 * User: vet
 * Date: 04.03.17
 * Time: 1:39
 */

session_start();
include_once '../lib/db_queries.php';

$id = $_GET['id'];
$post_id = $_GET['post_id'];
$content = $_POST['content'];

edit_record("comments", $id, "post_id", $post_id, "content", $content);
