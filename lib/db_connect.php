<?php
include_once 'config.php';
ini_set('display_errors',1);
$config = get_db_config();// получение user & password

$connect = mysqli_connect('localhost' , $config ['user'] , $config ['password']);//подключение к БД

if  (!$connect){
    die("Ошибка подключения:" . mysqli_connect_error($connect));
}

mysqli_select_db($connect, 'feed');//выбор БД


