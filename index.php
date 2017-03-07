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
<?php
echo "<span class = 'label label-danger glyphicon glyphicon-envelope label label-success'>";
echo show_flash_message ('message');
echo "</span>";
?>
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
        if (!select_records('posts')) {
            echo '<tr>';
            echo '<td colspan="6">' , 'Посты отсутствуют!' , '</td>';
            echo '</tr>';
        }
        foreach (select_records('posts') as $post) {
            echo "<tr>";
            echo "<td>" , $post->id , "</td>";
            echo "<td>" , $post->title , "</td>";
            echo "<td>" , $post->description , "</td>";
            echo "<td>" , "<a href='/show.php?id=$post->id'>Читать комментарии</a>" , "</td>";
            echo "<td>" , "<a href='/delete.php?id=$post->id'>Удалить</a>" , "</td>";
            echo "<td>" , "<a href='/edit_post.php?id=$post->id'>Редактировать</a>" , "</td>";
            echo "</tr>";
        }
        ?>
        </tbody>
    </table>
    <a class = "btn btn-primary" href="/new_posts.php">Новый пост</a>
</div>
</body>
</html>


