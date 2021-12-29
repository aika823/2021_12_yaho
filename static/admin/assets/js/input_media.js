function openImageUpdateInput(index) {
    console.log("open image update input");
    document.getElementsByClassName("input-update-image")[index].click()
}

function open_video_input(index) {
    document.getElementsByClassName("input-video")[index].click()
}

function onChangeImage(index) {

    const imageInput = document.getElementsByClassName('input-update-image')[index];
    const imageFile = document.getElementsByClassName('image-changable')[index];
    const room_image_index = document.getElementsByClassName('image-index')[index]
    const [file] = imageInput.files;

    if (file) {
        imageFile.src = URL.createObjectURL(file);
        room_image_index.value = index;
    }
}

function deleteImage(index) {
    console.log(index);
    const imageId = document.getElementsByClassName('image-id')[index].value;
    const deleteForm = document.getElementById('deleteImageForm');
    deleteForm.elements['room_image_id'].value = imageId;
    deleteForm.submit();
}

function change_video(index) {
    const video_input = document.getElementsByClassName('input-video')[index];
    const video_file = document.getElementsByClassName('video')[index];
    const [file] = video_input.files;
    if (file) {
        video_file.src = URL.createObjectURL(file);
    }
}