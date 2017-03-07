<?php
include_once 'db_connect.php';
/**
 * Created by PhpStorm.
 * User: vet
 * Date: 04.03.17
 * Time: 12:24
 */
//------------------Выборка--записей-----------------------------
function select_records($table_name, $field_name = false, $params = false, $first_record_force = false)
{
    $records = [];
    global $connect;
    $query_string = "SELECT * FROM $table_name";
    if ($field_name && $params) {
        $query_string .= " WHERE $field_name = $params";
    }
    $query = mysqli_query($connect, $query_string);
    if ($first_record_force) {
        $records = mysqli_fetch_object($query);
    } else {
        while ($result = mysqli_fetch_object($query)) {
            $records[] = $result;
        }
    }
    return $records;
}

//---------------------Удаление--записей--------------------------------------
function delete_record($table_name, $field, $params)
{
    global $connect;
    $query_string = "DELETE FROM $table_name WHERE $field = $params";
    $result = mysqli_query($connect, $query_string);
    return $result;
}

//---------------------Редактирование--записей---------------------------------------------------
function edit_record($table_name, $post_id = false, $field_first, $params_first, $field_second = false, $params_second = false)
{
    global $connect;
    $query_string = "UPDATE $table_name SET $field_first='$params_first'";
    if ($field_second && $params_second) {
        $query_string .= " , $field_second='$params_second'";
    }
    $query_string .= " WHERE id='$post_id'";
//    echo $query_string;die;
    $result = mysqli_query($connect, $query_string);
    if (!$result) {
        print_r(mysqli_error_list($connect));
    } else {
        if ($table_name == "posts") {
            $_SESSION['message'] = ' Ваш пост сохранён';
            return header('location:/');
        } else {
            $_SESSION['message'] = ' Ваш комментарий сохранён ';
            return header("location:/show.php?id=$params_first");
        }
    }
}

//---------------------Создание--записей--------------------
function create_record($table_name, $field_first, $params_first, $field_second, $params_second)
{
    global $connect;
    $query_string = "INSERT INTO $table_name ($field_first, $field_second) VALUES ('$params_first' , '$params_second')";
    $result = mysqli_query($connect, $query_string);
    if (!$result) {
        print_r(mysqli_error_list($connect));
    } elseif ($table_name == 'comments') {
        $_SESSION['message'] = ' Ваш комментарий сохранён ' . $params_second;
        return header("location:/show.php?id=$params_first");
    } else {
        $_SESSION['message'] = ' Ваш пост сохранён ' . $params_first;
        return header('location:/');
    }
}

