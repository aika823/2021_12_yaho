<?php

# Get database setting
include_once($_SERVER['DOCUMENT_ROOT'] . "/config.php");
include_once($_SERVER['DOCUMENT_ROOT'] . "/admin/common/check_session.php");

# Format data
$table = mysqli_real_escape_string($conn, $_POST['table']);
$id = mysqli_real_escape_string($conn, $_POST['id']);
$sql = " DELETE FROM {$table} WHERE id = {$id} ";


$result = mysqli_query($conn, $sql);
if ($result === false) {
  echo $sql;
  echo mysqli_error($conn);
} else {
  echo $sql;
  header('location:' . $_SERVER['HTTP_REFERER']);
}