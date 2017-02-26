<?php
include_once 'lib/db_connect.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="vet">
    <title>DateBase</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <table class="table table-hover">
        <thead>
        <th>ID</th>
        <th>Заголовок</th>
        <th>Описание</th>
        <th>Ссылка</th>
        </thead>
        <tbody>
        <?php
        $query = mysqli_query($connect, "SELECT * FROM posts");//выборка из таблицы posts
        $query_comments = mysqli_query($connect, "SELECT * FROM comments");//выборка из таблицы comments

        while ($post = mysqli_fetch_object($query)) {
            echo "<tr>";
            echo "<td>" . $post->id . "</td>";
            echo "<td>" . $post->title . "</td>";
            echo "<td>" . $post->description . "</td>";
            echo "<td>" . "<a href='/show.php?id=$post->id'>Читать комментарии</a>" . "</td>";
            echo "</tr>";
        }
        ?>
        </tbody>
    </table>
</div>
</body>
</html>


