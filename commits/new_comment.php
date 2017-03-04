<?php
/**
 * Created by PhpStorm.
 * User: vet
 * Date: 04.03.17
 * Time: 0:32
 */
$id = $_GET ['id'];
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="author" content="vet">
    <title>Создание комментария</title>
    <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <div class="row">
        <form method="post" action="/commits/create_comment.php?id=<?= $id ?>" class="form-horizontal col-md-6 col-md-offset-3">
            <h2>Добавить новый комментарий</h2>
            <div class="form-group">
                <label for="input1" class="col-sm-3 control-label">Комментарий</label>
                <div class="col-sm-9">
                    <input type="text" name="content" class="form-control" id="input1" placeholder="Название комментария"/>
                </div>
            </div>
            <input type="submit" class="btn btn-primary col-md-4 col-md-offset-8" value="Сохранить"/>
        </form>
    </div>
</div>
</body>
</html>

