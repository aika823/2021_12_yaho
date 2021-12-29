<?php

# Get database setting
include_once($_SERVER['DOCUMENT_ROOT'] . "/config.php");
include_once($_SERVER['DOCUMENT_ROOT'] . "/admin/common/check_session.php");
include_once($_SERVER['DOCUMENT_ROOT'] . "/admin/process_create_image.php");

foreach ($_POST as $key => $value) {
    if ($key != "table") {
        $field_list[] = mysqli_real_escape_string($conn, $key);
        $value_list[] = "'" . mysqli_real_escape_string($conn, $value) . "'";
    } else {
        $table = mysqli_real_escape_string($conn, $value);
    }
}

$field_string = "( " . implode(" , ", $field_list) . " )";
$value_string = "( " . implode(" , ", $value_list) . " )";

# MySQL query commit
$sql = " INSERT INTO {$table} {$field_string} VALUES {$value_string} ";

$result = mysqli_query($conn, $sql);
if ($result === false) {
    echo $sql;
    echo mysqli_error($conn);
} else {
    header('location:' . $_SERVER['HTTP_REFERER']);
}
