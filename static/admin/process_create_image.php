<?php

function create_image($filed_name, $file_name){

    $error_message = null;

    # Upload image if exist
    if ($_FILES[$filed_name]['size'] > 0) {
        $temp_file          = $_FILES[$filed_name]['tmp_name'];
        $file_type          = explode("/", $_FILES[$filed_name]['type'])[0];
        $file_extension     = explode("/", $_FILES[$filed_name]['type'])[1];
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
            $res_file_image = "../image/{$file_name}_{$date}_{$datetime}.{$file_extension}";
            $image_upload = move_uploaded_file($temp_file, $res_file_image);
            # Check image upload
            if ($image_upload == false) {
                $error_message = "파일 업로드에 실패하였습니다.";
                return NULL;
            }
            else{
                return $res_file_image;
            }
        } else {
            $error_message = "이미지 파일이 아닙니다.";
            return NULL;
        }
    }else{
        return NULL;
    }
    if ($error_message){
        echo $error_message;
        exit();
    }
}

function create_video($filed_name, $file_name)
{

    $error_message = null;

    # Upload video if exist
    if ($_FILES[$filed_name]['size'] > 0) {
        $temp_file          = $_FILES[$filed_name]['tmp_name'];
        $file_type          = explode("/", $_FILES[$filed_name]['type'])[0];
        $file_extension     = explode("/", $_FILES[$filed_name]['type'])[1];
        # Check image extension
        if (in_array($file_extension, ['mp4', 'wmv', 'avi'])) {
            $status_extension = true;
        } else {
            $status_extension   = false;
            $error_message = "동영상 전용 확장자 ('mp4', 'wmv', 'avi') 외에는 사용이 불가합니다.";
        }

        # Check image type
        if (($file_type == 'video') and $status_extension) {

            $date = date("Ymd");
            $datetime = date("His");
            $res_file_video = "{$file_name}_{$date}_{$datetime}.{$file_extension}";

            

            $image_upload = move_uploaded_file($temp_file, $res_file_video);
            # Check image upload
            if ($image_upload == false) {
                $error_message = "파일 업로드에 실패하였습니다.";
                return NULL;
            } else {
                return $res_file_video;
            }
        } else {
            $error_message = "동영상 파일이 아닙니다.";
        }
    } else {
        return null;
    }
    if ($error_message) {
        echo $error_message;
        exit();
    }
}

