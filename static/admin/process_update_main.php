<?php

# Get database setting
include_once($_SERVER['DOCUMENT_ROOT'] . "/config.php");
include_once(ROOT . "/admin/common/check_session.php");
include_once(ROOT . "/admin/process_update_image.php");

# Insert into database
$filtered = array(
  'id'              => mysqli_real_escape_string($conn, $_POST['id']),
  'name'            => mysqli_real_escape_string($conn, $_POST['name']),
  'product_detail0' => mysqli_real_escape_string($conn, $_POST['product_detail0']),
  'product_detail1' => mysqli_real_escape_string($conn, $_POST['product_detail1']),
  'product_detail2' => mysqli_real_escape_string($conn, $_POST['product_detail2']),
  'product_detail3' => mysqli_real_escape_string($conn, $_POST['product_detail3']),
  'slide_detail_1'  => mysqli_real_escape_string($conn, $_POST['slide_detail_1' ]),
  'slide_detail_2'  => mysqli_real_escape_string($conn, $_POST['slide_detail_2' ]),
  'slide_detail_3'  => mysqli_real_escape_string($conn, $_POST['slide_detail_3' ]),
);

# Get current product
$current_sql = "SELECT * FROM `product` WHERE `id`=  '{$filtered['id']}'";
$current_product = sql_to_list($conn, $current_sql)[0];

# MySQL query
$update_product_sql = "
  UPDATE main_product
    SET
      name            = '{$filtered['name']}',
      product_detail0 = '{$filtered['product_detail0']}',
      product_detail1 = '{$filtered['product_detail1']}',
      product_detail2 = '{$filtered['product_detail2']}',
      product_detail3 = '{$filtered['product_detail3']}',
      slide_detail_1  = '{$filtered['slide_detail_1']}',
      slide_detail_2  = '{$filtered['slide_detail_2']}',
      slide_detail_3  = '{$filtered['slide_detail_3']}'
    WHERE id    = '{$filtered['id']}'
";

$result = mysqli_query($conn, $update_product_sql);

update_image($conn, 'main_product', $filtered['id'], 'slide_img_1', 'slide_img_1');
update_image($conn, 'main_product', $filtered['id'], 'slide_img_2', 'slide_img_2');
update_image($conn, 'main_product', $filtered['id'], 'slide_img_3', 'slide_img_3');
update_image($conn, 'main_product', $filtered['id'], 'product_image1', 'product_image1');
update_image($conn, 'main_product', $filtered['id'], 'product_image2', 'product_image2');
update_image($conn, 'main_product', $filtered['id'], 'product_image3', 'product_image3');

update_video($conn, 'main_product', $filtered['id'], 'video1', 'video1');
update_video($conn, 'main_product', $filtered['id'], 'video2', 'video2');

header('Location: detail_main.php?id=' . $filtered['id']);
