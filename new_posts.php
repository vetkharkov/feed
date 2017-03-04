<?php
/**
 * Created by PhpStorm.
 * User: vet
 * Date: 01.03.17
 * Time: 18:52
 */

?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="author" content="vet">
    <title>Отправка поста</title>
    <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <div class="row">
        <form method="post" action="/create_post.php" class="form-horizontal col-md-6 col-md-offset-3">
            <h2>Добавить новый пост</h2>
            <div class="form-group">
                <label for="input1" class="col-sm-2 control-label">Заголовок</label>
                <div class="col-sm-10">
                    <input type="text" name="title" class="form-control" id="input1" placeholder="Название заголовока"/>
                </div>
            </div>

            <div class="form-group">
                <label for="description" class="col-sm-2 control-label">Описание</label>
                <div class="col-sm-10">
                    <textarea name="description" class="form-control" id="description"
                              placeholder="Содержание..."></textarea>
                </div>
            </div>
            <input type="submit" class="btn btn-primary col-md-4 col-md-offset-8" value="Сохранить"/>
        </form>
    </div>
</div>


</body>
</html>
