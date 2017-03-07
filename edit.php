<?php
/**
 * Created by PhpStorm.
 * User: vet
 * Date: 03.03.17
 * Time: 0:18
 */

session_start();
include_once 'lib/db_queries.php';

$id = $_GET['id'];
$title = $_POST['title'];
$description = $_POST['description'];

edit_record("posts", $id, "title", $title, "description", $description);
