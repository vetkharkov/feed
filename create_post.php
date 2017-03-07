<?php
/**
 * Created by PhpStorm.
 * User: vet
 * Date: 01.03.17
 * Time: 19:30
 */
session_start();
include_once 'lib/db_queries.php';

$title = $_POST['title'];
$description = $_POST['description'];

create_record("posts", "title", $title, "description", $description);
