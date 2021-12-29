<?php

# Get database setting
include_once($_SERVER['DOCUMENT_ROOT'] . "/config.php");
include_once(ROOT . "/admin/common/check_session.php");
include_once(ROOT . "/admin/process_create_image.php");

# Insert into database
$filtered = array(
    'name' => mysqli_real_escape_string($conn, $_POST['name']),

    'product_detail0' => mysqli_real_escape_string($conn, $_POST['product_detail0']),
    'product_detail1' => mysqli_real_escape_string($conn, $_POST['product_detail1']),
    'product_detail2' => mysqli_real_escape_string($conn, $_POST['product_detail2']),
    'product_detail3' => mysqli_real_escape_string($conn, $_POST['product_detail3']),
    
    'slide_detail1' => mysqli_real_escape_string($conn, $_POST['slide_detail1']),
    'slide_detail2' => mysqli_real_escape_string($conn, $_POST['slide_detail2']),
    'slide_detail3' => mysqli_real_escape_string($conn, $_POST['slide_detail3']),
);

$res_file = [];
$res_file[0] = create_image('product_image1', 'product_image1');
$res_file[1] = create_image('product_image2', 'product_image2');
$res_file[2] = create_image('product_image3', 'product_image3');

$res_file[3] = create_image('slide_img_1', 'slide_img_1');
$res_file[4] = create_image('slide_img_2', 'slide_img_2');
$res_file[5] = create_image('slide_img_3', 'slide_img_3');

$res_file[6] = create_video('video1', 'video1');
$res_file[7] = create_video('video2', 'video2');


# MySQL query commit
$sql = "
  INSERT INTO main_product
    (
        name, 

        product_detail0, 
        product_detail1, 
        product_detail2, 
        product_detail3, 

        slide_detail_1, 
        slide_detail_2,
        slide_detail_3,

        product_image1,
        product_image2,
        product_image3,

        slide_img_1,
        slide_img_2,
        slide_img_3,

        video1,
        video2
    )
    VALUES(
        '{$filtered['name']}',

        '{$filtered['product_detail0']}',
        '{$filtered['product_detail1']}',
        '{$filtered['product_detail2']}',
        '{$filtered['product_detail3']}',
        
        '{$filtered['slide_detail_1']}',
        '{$filtered['slide_detail_2']}',
        '{$filtered['slide_detail_3']}',

        '{$res_file[0]}',
        '{$res_file[1]}',
        '{$res_file[2]}',

        '{$res_file[3]}',
        '{$res_file[4]}',
        '{$res_file[5]}',

        '{$res_file[6]}',
        '{$res_file[7]}'
    )
";

$result = mysqli_query($conn, $sql);
if ($result === false) {
    echo mysqli_error($conn);
} else {
    $main_product_id = $conn->insert_id;
    header('Location: detail_main.php?id=' . $main_product_id);
}
