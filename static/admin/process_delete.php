<?php

# Get database setting
include_once($_SERVER['DOCUMENT_ROOT'] . "/config.php");
include_once($_SERVER['DOCUMENT_ROOT'] . "/admin/common/check_session.php");

# Format data
$filtered = array('id' => mysqli_real_escape_string($conn, $_POST['id']),);

# Delete menu image
$sql1 = "SELECT image1 FROM product WHERE id = {$filtered['id']}";
$sql2 = "SELECT image2 FROM product WHERE id = {$filtered['id']}";
$sql3 = "SELECT image3 FROM product WHERE id = {$filtered['id']}";

$image1 = sql_to_list($conn, $sql1)[0]['image1'];
$image2 = sql_to_list($conn, $sql2)[0]['image2'];
$image3 = sql_to_list($conn, $sql3)[0]['image3'];



if (file_exists($image1)) {
  unlink($image1);
}
if (file_exists($image2)) {
  unlink($image2);
}
if (file_exists($image3)) {
  unlink($image3);
}

# Delete menu from database
$sql = " DELETE FROM product WHERE id = {$filtered['id']} ";
$result = mysqli_query($conn, $sql);
if ($result === false) {
  $error_message = error_log(mysqli_error($conn));
  echo "<script>alert('" . $error_message . "');</script>";
} else {
  echo "<script>alert('삭제되었습니다.');</script>";
  header('Location: index.php');
}
