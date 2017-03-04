<?php
session_start();
include_once 'lib/db_connect.php';
$click = $_POST['click'];
$show_id = $_GET ['id'];
$query = mysqli_query($connect, "SELECT * FROM posts WHERE id = $show_id  LIMIT 1");
$post = mysqli_fetch_object($query);
$query_comments = mysqli_query($connect, "SELECT * FROM comments WHERE post_id = $show_id ");//выборка из таблицы comments
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
<?php
if (!empty($_SESSION['message'])) echo "<span class = 'label label-success'>" . $_SESSION['message'] . "</span>";
?>
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

    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <ul class="list-group">
                <li class="list-group-item active">Комментарии</li>
                <?php if (isset($_POST['click'])) {
                    while ($post_comments = mysqli_fetch_object($query_comments)) {
                        echo "<li class='list-group-item'>" . $post_comments->content . " " . "<a href='/commits/delete_comments.php?id=$post_comments->id&post_id=$show_id'><span class=\"glyphicon glyphicon-remove text-danger\"></span></a>" . " " . "<a href='/commits/edit_comment.php?id=$post_comments->id&post_id=$show_id'><span class=\"glyphicon glyphicon-pencil text-success\"></span></a>" . "</li>";
                    }
                } else {
                    $post_comments = mysqli_fetch_object($query_comments);
                    echo "<li class='list-group-item'>" . $post_comments->content . "</li>";
                }
                ?>
                <li class='list-group-item'>
                    <!----------------Показать все комментарии----------------------->
                    <form action="" method="post">
                        <input name="click" type="hidden"> </input>
                        <input class="btn btn-success" type="submit" value="Показать все комментарии">
                    </form>
                </li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10">
            <a class = "btn btn-primary" href="/commits/new_comment.php?id=<?= $post->id ?>">Новый комментарий</a>
        </div>
        <div class="col-md-2">
            <a href='/' class="btn btn-success">Ссылка назад</a>
        </div>
    </div>
</body>
</html>