<?php
session_start();
include_once 'lib/flash_massages.php';
include_once 'lib/db_queries.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="vet">
    <title>DateBase</title>
    <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-1">
            <a href='/login/index.php' class="btn btn-success"><span class='glyphicon glyphicon-user'></span> Log</a>
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
<div class="container">
    <table class="table table-hover">
        <thead>
        <th>ID</th>
        <th>Заголовок</th>
        <th>Описание</th>
        <th>Ссылка</th>
        <th>Удалить</th>
        <th>Редактировать</th>
        </thead>
        <tbody>
        <?php
        $res = select_records('posts');
        if (!$res) {
            echo '<tr>';
            echo '<td colspan="6">', 'Посты отсутствуют!', '</td>';
            echo '</tr>';
        }
        foreach ($res as $post) {
            echo "<tr>";
            echo "<td>", $post->id, "</td>";
            echo "<td>", $post->title, "</td>";
            echo "<td>", $post->description, "</td>";
            echo "<td>", "<a href='/show.php?id=$post->id'>Читать комментарии</a>", "</td>";
            echo "<td>", "<a href='/delete.php?id=$post->id'><span class='glyphicon glyphicon-remove text-danger'></span></a>", "</td>";
            echo "<td>", "<a href='/edit_post.php?id=$post->id'><span class='glyphicon glyphicon-pencil text-success'></span></a>", "</td>";
            echo "</tr>";
        }
        ?>
        </tbody>
    </table>
    <a class="btn btn-primary" href="/new_posts.php">Новый пост</a>
</div>
</body>
</html>


