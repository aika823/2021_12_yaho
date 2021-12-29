<?php

// get setting
include_once($_SERVER['DOCUMENT_ROOT'] . "/config.php");
include_once(ROOT . "/connection.php");

// Format data
$filtered = array(
    'name' => mysqli_real_escape_string($conn, $_POST['name']),
    'password' => mysqli_real_escape_string($conn, $_POST['password']),
);

// MySQL query commit
$sql = "
    SELECT * FROM admin WHERE
    `name` = '{$filtered['name']}' 
    AND
    `password` = '{$filtered['password']}'
";
$result = $conn->query($sql);

// Set session
if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    session_start();
    $_SESSION['user_id'] = $row['id'];
    $_SESSION['user_name'] = $row['name'];
    $index_url = SERVER . "/admin/index.php";
    echo "<script>window.location.href='{$index_url}'</script>";
} else {
    $login_url = SERVER . "/admin/login.php";
    echo "<script>alert('로그인에 실패했습니다');</script>";
    echo "<script>window.location.href='{$login_url}'</script>";
}
$conn->close();
