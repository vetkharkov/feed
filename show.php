<?php
session_start();
include_once 'lib/db_queries.php';
//var_dump($_POST);
//die;
$id_post = $_GET ['id'];
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="vet">
    <title>Show</title>
    <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-2">
            <a href='/' class="btn btn-success"><span class='glyphicon glyphicon-arrow-left'></span> Ссылка назад</a>
        </div>
        <div class="col-md-3 col-md-offset-7">
            <?php
            if (!empty($_SESSION['message'])) echo "<span class = 'label label-danger glyphicon glyphicon-envelope label label-success'>", " ", $_SESSION['message'], "</span>";
            $post = select_records('posts', 'id', $id_post, true)
            ?>
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
                foreach (select_records('comments', 'post_id', $id_post) as $post_comment) {
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