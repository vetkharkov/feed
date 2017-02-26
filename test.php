<?php
$connect = mysqli_connect('localhost','root','1980');//подключение к БД

if  (!$connect){
    die("Ошибка подключения:" . mysqli_connect_error($connect));
}
mysqli_select_db($connect, 'feed');//выбор БД
////$query = mysqli_query($connect , "SELECT * FROM posts WHERE id IN (1,5)");
//$query = mysqli_query($connect , "SELECT * FROM posts");
////$rows =  mysqli_fetch_assoc($query);
//$rows =  mysqli_fetch_object($query);
////----------------------------------
//echo $rows->id;echo "<br>";
//echo $rows->title;echo "<br>";
//echo $rows->description;echo "<br>";
//echo "<hr>";
////----------------------------------
//echo "<pre>";
//print_r($query);
//echo "</pre>";
echo "<hr>";
//----------------------------------------------------------------------
//$query = mysqli_query($connect , "SELECT * FROM posts");
//while ($post = mysqli_fetch_object($query)){
//    echo "<pre>";
//    print_r($post);
//    echo "</pre>";
//}

$query_com = mysqli_query($connect , "SELECT * FROM comments WHERE post_id=('2')");
while ($post_com = mysqli_fetch_object($query_com)){
    echo $post_com->content."<br>";
}
