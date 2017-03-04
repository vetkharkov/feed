<?php
include_once 'db_connect.php';
/**
 * Created by PhpStorm.
 * User: vet
 * Date: 04.03.17
 * Time: 12:24
 */
function select_records ($table_name  , $field_name = false, $params = false , $first_record_force = false) {
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
function delete_record ($table_name , $field , $params) {
    global $connect;
    $query_string = "DELETE FROM $table_name WHERE $field = $params";
    $result = mysqli_query($connect, $query_string);
    return $result;
}
