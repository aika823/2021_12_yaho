<?php

# Get database setting
include_once($_SERVER['DOCUMENT_ROOT'] . "/config.php");
include_once(ROOT . "/admin/common/check_session.php");
include_once(ROOT . "/admin/process_update_image.php");

# Insert into database
$filtered = array(
  'id' => mysqli_real_escape_string($conn, $_POST['id']),
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

# Get current product
$current_sql = "SELECT * FROM `product` WHERE `id`=  '{$filtered['id']}'";
$result = $conn->query($current_sql);
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $product_array[] = $row;
  }
}
$current_product = $product_array[0];

# MySQL query
$update_product_sql = "
  UPDATE product
    SET
      name      = '{$filtered['name']}',
      category  = '{$category_id}',
      detail    = '{$filtered['detail']}'
    WHERE id    = '{$filtered['id']}'
";
$result = mysqli_query($conn, $update_product_sql);

update_image($conn, 'product', $filtered['id'], 'image1','img1');
update_image($conn, 'product', $filtered['id'], 'image2','img2');
update_image($conn, 'product', $filtered['id'], 'image3','img3');


header('Location: detail.php?name=' . $filtered['name']);
