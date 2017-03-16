<?php
/**
 * Created by PhpStorm.
 * User: vet
 * Date: 11.03.17
 * Time: 14:39
 */
require_once '../lib/auth_check.php';
require_once '../lib/flash_massages.php';
redirect_if_user_auth();
?>
<html>
<head>
    <title>Форма входа</title>
    <meta charset="UTF-8">
    <meta name="author" content="vet">
    <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-3 col-md-offset-9">
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
    <div class="row">
        <form method="post" action="user_auth.php" class="form-horizontal col-md-6 col-md-offset-3">
            <h2>Форма входа</h2>
            <div class="form-group">
                <label for="input1" class="col-sm-2 control-label">Логин</label>
                <div class="col-sm-10">
                    <input type="text" name="login" class="form-control" id="input1" placeholder="Ваше имя..."/>
                </div>
            </div>

            <div class="form-group">
                <label for="input1" class="col-sm-2 control-label">Пароль</label>
                <div class="col-sm-10">
                    <input type="password" name="password" class="form-control" id="input1" placeholder="Пароль"/>
                </div>
            </div>

            <input type="submit" class="btn btn-primary col-md-2 col-md-offset-10" value="Вход"/>
        </form>
    </div>
</div>
</body>
</html>
