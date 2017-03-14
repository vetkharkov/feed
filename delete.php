<?php
/**
 * Created by PhpStorm.
 * User: vet
 * Date: 01.03.17
 * Time: 20:45
 */
session_start();

include_once 'lib/db_queries.php';

$id = $_GET['id'];

delete_record('comments', 'post_id', $id);//Удаляем все комментарии
delete_record('posts', 'id', $id);//а потом post

