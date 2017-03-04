<?php
/**
 * Created by PhpStorm.
 * User: vet
 * Date: 04.03.17
 * Time: 1:24
 */
session_start();
include_once '../lib/db_connect.php';

$id = $_GET['id'];
$post_id = $_GET['post_id'];

$query = mysqli_query($connect, "SELECT * FROM comments WHERE id = $id  LIMIT 1");
$comment = mysqli_fetch_object($query);
?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="author" content="vet">
    <title>Редактирование комментария</title>
    <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <div class="row">
        <form method="post" action="../commits/update_comment.php?id=<?= $id ?>&post_id=<?= $post_id ?>"
              class="form-horizontal col-md-6 col-md-offset-3">
            <h2>Редактировать комментарий</h2>
            <div class="form-group">
                <label for="input1" class="col-sm-3 control-label">Комментарий</label>
                <div class="col-sm-9">
                    <input type="text" name="content" class="form-control" id="input1" value="<?= $comment->content ?>"
                           placeholder="<?= $comment->content ?>"/>
                </div>
            </div>

            <input type="submit" class="btn btn-primary col-md-4 col-md-offset-8" value="Сохранить"/>
        </form>
    </div>
</div>
</body>
</html>