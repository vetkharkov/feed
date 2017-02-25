<?php
include_once 'lib/db_connect.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Show</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
</head>
<body>
    <?php
    $query = mysqli_query($connect , "SELECT * FROM posts WHERE id={$_GET['id']} LIMIT 1");
    $post = mysqli_fetch_object($query);
//    echo $_GET ['id'];
    echo "<h1>".$post->title."</h1>";
    echo "<p>".$post->description."</p>";
    echo "<a href='/'>Ссылка назад</a>";
    ?>

</body>
</html>





