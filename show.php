<?php
session_start();
include_once 'lib/flash_massages.php';
include_once 'lib/db_queries.php';
$id_post = $_GET ['id'];
$post = select_records('posts', 'id', $id_post, true);
?>
<!doctype html>
<html lang="en">
<head>
    <title>Show</title>
    <meta charset="UTF-8">
    <meta name="author" content="vet">
    <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-1">
            <a href='/' class="btn btn-success"><span class='glyphicon glyphicon-home'></span> На главную</a>
        </div>
        <div class="col-md-2 col-md-offset-8">
            <span class='label label-danger glyphicon glyphicon-envelope label label-success'>
                <?php
                if (flash_exists('message')) {
                    echo show_flash_message('message');
                } else {
                    echo " ";
                }
                ?>
            </span>
        </div>
    </div>
</div>
<!------------------------Заголовок---и---Описание----------------------->
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Заголовок : <?= $post->title ?></h3>
                </div>
                <div class="panel-body">
                    Описание : <?= $post->description ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-----------------------Комментарии------------------------------>
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h2 class="col-md-2 col-md-offset-3">Комментарии</h2>
            <table class='table table-hover'>
                <thead>
                <th>ID</th>
                <th>Комментарий</th>
                <th>Удалить</th>
                <th>Редактировать</th>
                </thead>
                <tbody>
                <?php
                $res = select_records('comments', 'post_id', $id_post);
                if (!$res) {
                    echo '<tr>';
                    echo '<td colspan="4">', 'Комментарии отсутствуют!', '</td>';
                    echo '</tr>';
                }
                foreach ($res as $post_comment) {
                    echo '<tr>';
                    echo '<td>', $post_comment->id, '</td>';
                    echo '<td>', $post_comment->content, '</td>';
                    echo '<td>', "<a href='/commits/delete_comments.php?id=$post_comment->id&post_id=$id_post'><span class='glyphicon glyphicon-remove text-danger'></span></a>", '</td>';
                    echo '<td>', "<a href='/commits/edit_comment.php?id=$post_comment->id&post_id=$id_post'><span class='glyphicon glyphicon-pencil text-success'></span></a>", '</td>';
                    echo '</tr>';
                }
                ?>
                <tr>
                    <td colspan="4">
                        <a class="btn btn-primary" href="/commits/new_comment.php?id=<?= $post->id ?>">Новый
                            комментарий</a>
                    </td>
                </tr>
                </tbody>
        </div>
    </div>
</div>
</body>
</html>