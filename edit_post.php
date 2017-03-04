<?php
/**
 * Created by PhpStorm.
 * User: vet
 * Date: 01.03.17
 * Time: 21:17
 */
session_start();
include_once 'lib/db_connect.php';

$id = $_GET['id'];
$query = mysqli_query($connect, "SELECT * FROM posts WHERE id = $id  LIMIT 1");
$post = mysqli_fetch_object($query);




//if (!empty($id)) {
//    $query = "SELECT * FROM `posts` WHERE id = $id";
//    $result =  mysqli_query($connect , $query);
//    if (!$post = mysqli_fetch_object($result)) {
//        $_SESSION['message'] = 'Ваш пост 404';
//        return header('location:/');
//    } else {
//        $_SESSION['message'] = 'Ваш пост удалён';
//        return header('location:/');
//    }
//} else {
//    $_SESSION['message'] = 'Введите корректный id';
//    return header('location:/');
//}
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="author" content="vet">
    <title>Редактирование поста</title>
    <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <div class="row">
        <form method="post" action="/edit.php?id=<?= $id ?>" class="form-horizontal col-md-6 col-md-offset-3">
            <h2>Редактировать пост</h2>
            <div class="form-group">
                <label for="input1" class="col-sm-2 control-label">Заголовок</label>
                <div class="col-sm-10">
                    <input type="text" name="title" class="form-control" id="input1" value="<?= $post->title ?>" placeholder="<?= $post->title ?>"/>
                </div>
            </div>

            <div class="form-group">
                <label for="description" class="col-sm-2 control-label">Описание</label>
                <div class="col-sm-10">
                    <textarea name="description" class="form-control" id="description"
                              placeholder="<?= $post->description ?>"><?= $post->description ?></textarea>
                </div>
            </div>
            <input type="submit" class="btn btn-primary col-md-4 col-md-offset-8" value="Сохранить"/>
        </form>
    </div>
</div>
</body>
</html>





