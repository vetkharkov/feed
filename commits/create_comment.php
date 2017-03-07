<?php
/**
 * Created by PhpStorm.
 * User: vet
 * Date: 04.03.17
 * Time: 0:41
 */
session_start();
include_once '../lib/db_queries.php';

$post_id = $_GET['id'];
$content = $_POST['content'];

create_record("comments", "post_id", $post_id, "content", $content);