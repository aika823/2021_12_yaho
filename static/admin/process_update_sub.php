<?php

# Get database setting
include_once($_SERVER['DOCUMENT_ROOT'] . "/config.php");
include_once($_SERVER['DOCUMENT_ROOT'] . "/admin/common/check_session.php");
include_once($_SERVER['DOCUMENT_ROOT'] . "/admin/process_create_image.php");

foreach ($_POST as $key => $value) {
  if ($key == "table") {
    $table = mysqli_real_escape_string($conn, $value);
  } elseif ($key == "id") {
    $id = mysqli_real_escape_string($conn, $value);
  } else {
    $update_list[] = " {$key} = '{$value}' ";
  }
}

$update_string = implode(" , ", $update_list);
$sql = " UPDATE {$table} SET {$update_string} WHERE id = '{$id}'";

$result = mysqli_query($conn, $sql);
if ($result === false) {
  echo $sql;
  echo mysqli_error($conn);
} else {
  header('location:' . $_SERVER['HTTP_REFERER']);
}
