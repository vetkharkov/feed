<?php
//phpinfo();
include_once 'lib/db_connect.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Base</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</head>
<body>
    <table class="table table-hover">
        <thead>
            <th>ID</th>
            <th>Заголовок</th>
            <th>Описание</th>
            <th>Ссылка</th>
        </thead>
        <tbody>
        <?php
        $query = mysqli_query($connect , "SELECT * FROM posts");

        while ($post = mysqli_fetch_object($query)){
//            print_r($post);
            echo "<tr>";
            echo "<td>".$post->id."</td>";
            echo "<td>".$post->title."</td>";
            echo "<td>".$post->description."</td>";
            echo "<td>"."<a href='/show.php?id=$post->id'>Читать ...</a>"."</td>";
            echo "</tr>";
        }
        ?>
        </tbody>
    </table>
</body>
</html>


