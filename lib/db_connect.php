<?php
ini_set('displey_errors',1);
$connect = mysqli_connect('localhost','root','1980');//подключение к БД

if  (!$connect){
    die("Ошибка подключения:" . mysqli_connect_error($connect));
}

mysqli_select_db($connect, 'feed');//выбор БД


