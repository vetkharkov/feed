<?php
include_once 'db_connect.php';
include_once 'flash_massages.php';

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
function delete_record($table_name, $field, $params, $post_id = '')
{
    global $connect;
    $query_string = "DELETE FROM $table_name WHERE $field = $params";
    $result = mysqli_query($connect, $query_string);
    if (!empty($params)) {
        if (!$result) {
            set_flash_message(4);//Ошибка удаления
        } else {
            ($table_name == 'comments') ? set_flash_message(2) : set_flash_message(3);
        }//                             Ваш комментарий удалён : Ваш пост удалён
    } else {
        set_flash_message(5);//Введите корректный id
    }
    return ($table_name == 'comments') ? header("location:/show.php?id=$post_id") : header('location:/');
}

//---------------------Создание--записей--------------------

function create_record($table_name, $params)
{
    global $connect;
    if (empty($params)) return false;
    $keys = implode(', ', array_keys($params));
    $values = array_map(function ($val) use ($connect) {
        return '\'' . mysqli_real_escape_string($connect, $val) . '\'';
    }, $params);
    $values = implode(', ', $values);
    $field_names = '(' . $keys . ')';
    $field_values = ' VALUES (' . $values . ')';
    $query_string = "INSERT INTO `$table_name` " . $field_names . $field_values;
    return mysqli_query($connect, $query_string);
}

//-------------------------------------------------------
function my_create_record($table_name, $params)
{
    global $connect;
    $field = '';
    $value = '';
    if (!$params) return false;
    foreach ($params as $key => $val) {
        $field .= $key . ',';
        $val = addslashes($val);//экранируем кавычки
        $value .= '"' . $val . '"' . ',';
    }
    $field = substr($field, 0, -1);//удаляем лишнюю
    $value = substr($value, 0, -1);//запятую
    $query_string = "INSERT INTO $table_name " . "(" . $field . ")" . " VALUES  " . "(" . $value . ")";
    return mysqli_query($connect, $query_string);
}

//---------------------Редактирование--записей---------------------
function update_record($table_name, $params, $field_name = '')
{
    global $connect;
    $query_string = "UPDATE `$table_name` SET ";
    $force_id = null;
    if (array_key_exists('id', $params)) {
        $force_id = $params['id'];
        unset($params['id']);
    }
    array_walk($params, function (&$value, $key) use ($connect, $query_string) {
        $value = "$key = '" . mysqli_real_escape_string($connect, $value) . '\'';
    });
    $query_string .= implode($params, ', ');
    if (($field_name && $params[$field_name]) || $force_id) {
        if (!$field_name || ($field_name && !array_key_exists($field_name, $params))) {
            $field_name = 'id';
            $field_value = mysqli_real_escape_string($connect, $force_id);
        } else {
            $field_value = mysqli_real_escape_string($connect, $params[$field_name]);
        }
        $query_string .= "WHERE $field_name = $field_value";
    }
    return mysqli_query($connect, $query_string);
}

//------------------------------------------------------------------
function my_update_record($table_name, $params, $field_query = "id") {
    global $connect;
    $field = '';
    $id = $params[$field_query];
    $query_string = "UPDATE `$table_name` SET ";
    if (!$params) return false;
    foreach ($params as $key => $val) {
        $val = addslashes($val);//экранируем кавычки
        $field .= $key . "=" . "'" . $val . "'" . ",";
    }
    $field = substr($field, 0, -1);//удаляем лишнюю запятую
    $query_string .= $field . " WHERE $field_query=$id";
    return mysqli_query($connect, $query_string);
}
