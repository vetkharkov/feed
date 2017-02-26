<?php
include_once 'lib/db_connect.php';
$click = $_POST['click'];
$show_id = $_GET ['id'];
$query = mysqli_query($connect, "SELECT * FROM posts WHERE id=('$show_id') LIMIT 1");
$post = mysqli_fetch_object($query);
$query_comments = mysqli_query($connect, "SELECT * FROM comments WHERE post_id=('$show_id')");//выборка из таблицы comments
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="vet">
    <title>Show</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <!------------------------Заголовок---и---Описание----------------------->
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
    <!---------------------------------------------------------------------->
    <p class="text-right"><a href='/' class="btn btn-primary btn-xs">Ссылка назад</a></p>
    <!--------------------------Комментарии--------------------------------->
    <ul class="list-group">
        <li class="list-group-item active">Комментарии</li>
        <?php if (isset($_POST['click'])) {
            while ($post_comments = mysqli_fetch_object($query_comments)) {
                echo "<li class='list-group-item'>" . $post_comments->content . "</li>";
            }
        } else {
            $post_comments = mysqli_fetch_object($query_comments);
            echo "<li class='list-group-item'>" . $post_comments->content . "</li>";
        }
        ?>
    </ul>
    <!----------------Показать все комментарии----------------------->
    <form action="" method="post">
        <input name="click" type="hidden"> </input>
        <input type="submit" value="Показать все комментарии">
    </form>
    <!--------------------------------------------------------------->
</div>
</body>
</html>