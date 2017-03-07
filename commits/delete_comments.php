<?php
/**
 * Created by PhpStorm.
 * User: vet
 * Date: 03.03.17
 * Time: 23:56
 */
session_start();

include_once '../lib/db_queries.php';

$id = $_GET['id'];
$post_id = $_GET['post_id'];

delete_record('comments', 'id', $id, $post_id);

