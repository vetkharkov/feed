<?php
/**
 * Created by PhpStorm.
 * User: vet
 * Date: 15.03.17
 * Time: 21:20
 */
function uploader($post_type, $id){
    $target_dir = "upload/$post_type/$id";
    if(is_dir($target_dir)){
        if(!mkdir($target_dir, 0777, true)) {
            die('Не удалось создать директории');
        }
    };
    $base_name = basename($_FILES["fileToUpload"]["name"]);
    $target_file = $target_dir . $base_name;
    if(empty($_FILES["file"])) {
        if($_FILES["file"]["error"] > 0) {
            echo "Error: " . $_FILES["file"]["error"] . "<br>";
        } else {
            move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
            return $base_name;
        }
    }
}
