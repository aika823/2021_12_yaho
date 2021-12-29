<?php

function update_image($conn, $table, $id,  $field_name, $file_name){

    # Get current product
    $current_sql = "SELECT * FROM `{$table}` WHERE `id`=  '{$id}'";
    $current_product = sql_to_list($conn, $current_sql)[0];
   
    # Update image if exist
    if ($_FILES[$field_name]['size'] > 0) {

        $temp_file          = $_FILES[$field_name]['tmp_name'];
        $file_type          = explode("/", $_FILES[$field_name]['type'])[0];
        $file_extension     = explode("/", $_FILES[$field_name]['type'])[1];

        # Check image extension
        if (in_array($file_extension, ['jpeg', 'jpg', 'png'])) {
            $status_extension = true;
        } else {
            $status_extension   = false;
            $error_message = "이미지 전용 확장자 외에는 사용이 불가합니다.";
        }
        
        # Check image type
        if (($file_type == 'image') and $status_extension) {
            $date = date("Ymd");
            $datetime = date("His");
            $res_file = "../image/{$file_name}_{$date}_{$datetime}.{$file_extension}";
            $image_upload = move_uploaded_file($temp_file, $res_file);
            
            # Check image upload
            if ($image_upload == false) {
                $error_message = "파일 업로드에 실패하였습니다.";
            } else {
                # Delete current image
                if (file_exists($current_product[$field_name])) {
                    unlink($current_product[$field_name]);
                }
                # MySQL query
                $sql2 = "UPDATE {$table} SET {$field_name} = '{$res_file}' WHERE id = {$id} ;";
                $result2 = mysqli_query($conn, $sql2);
            }
        } else {
            $error_message = "이미지 파일이 아닙니다.";
            exit;
        }
    }
    
    if($error_message){
        echo $error_message;
        exit();
    }

}

function update_video($conn, $table, $id,  $field_name, $file_name)
{
    # Get current product
    $current_sql = "SELECT * FROM `{$table}` WHERE `id`=  '{$id}'";
    $current_product = sql_to_list($conn, $current_sql)[0];

    # Update video if exist
    if ($_FILES[$field_name]['size'] > 0) {
        $temp_file          = $_FILES[$field_name]['tmp_name'];
        $file_type          = explode("/", $_FILES[$field_name]['type'])[0];
        $file_extension     = explode("/", $_FILES[$field_name]['type'])[1];

        # Check video extension
        if (in_array($file_extension, ['mp4', 'wmv', 'avi'])) {
            $status_extension = true;
        } else {
            $status_extension   = false;
            $error_message = "동영상 전용 확장자 ('mp4', 'wmv', 'avi') 외에는 사용이 불가합니다.";
        }

        # Check video type
        if (($file_type == 'video') and $status_extension) {
            $date = date("Ymd");
            $datetime = date("His");
            $res_video_file = "../video/{$file_name}_{$date}_{$datetime}.{$file_extension}";
            $video_upload = move_uploaded_file($temp_file, $res_video_file);
            # Check video upload
            if ($video_upload == false) {
                $error_message = "파일 업로드에 실패하였습니다.";
            } else {
                # Delete current video
                if (file_exists($current_product[$field_name])) {
                    unlink($current_product[$field_name]);
                }
                # MySQL query
                $sql2 = "UPDATE {$table} SET {$field_name} = '{$res_video_file}' WHERE id = {$id} ;";
                $result2 = mysqli_query($conn, $sql2);
            }
        } else {
            $error_message = "이미지 파일이 아닙니다.";
            exit;
        }
    }

    if ($error_message) {
        echo $error_message;
        exit();
    }
}