<?php
/**
 * Created by PhpStorm.
 * User: vet
 * Date: 01.03.17
 * Time: 20:45
 */

include_once 'lib/db_queries.php';
include_once 'lib/auth_check.php';
check_user_auth();

$id = $_GET['id'];

delete_record('comments', 'post_id', $id);//Удаляем все комментарии
delete_record('posts', 'id', $id);//а потом post

