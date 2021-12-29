<?php

# Get database setting
include_once($_SERVER['DOCUMENT_ROOT'] . "/config.php");
include_once($_SERVER['DOCUMENT_ROOT'] . "/admin/common/check_session.php");
include_once($_SERVER['DOCUMENT_ROOT'] . "/admin/process_create_image.php");

# Insert into database
$filtered = array(
    'name' => mysqli_real_escape_string($conn, $_POST['name']),
    'category' => mysqli_real_escape_string($conn, $_POST['category']),
    'detail' => mysqli_real_escape_string($conn, $_POST['detail']),
);

$category_check_sql = "SELECT * FROM category WHERE category='{$filtered['category']}'";
$check = sql_to_list($conn, $category_check_sql);

if($check){
    $category_id = $check[0]['id'];
}else{
    $category_add_sql = "INSERT INTO category (category) values ('{$filtered['category']}')";
    mysqli_query($conn, $category_add_sql);
    $category_id = mysqli_insert_id($conn);
}

$res_file = [];
$res_file[0] = create_image('image1','img1');
$res_file[1] = create_image('image2','img2');
$res_file[2] = create_image('image3','img3');

# MySQL query commit
$sql = "
  INSERT INTO product
    (name, category, detail, image1, image2, image3)
    VALUES(
        '{$filtered['name']}',
        '{$category_id}',
        '{$filtered['detail']}',
        '{$res_file[0]}',
        '{$res_file[1]}',
        '{$res_file[2]}'
    )
";

$result = mysqli_query($conn, $sql);
if ($result === false) {
    echo $sql;
    echo mysqli_error($conn);
} else {
    header('Location: detail.php?name=' . $filtered['name']);
}
