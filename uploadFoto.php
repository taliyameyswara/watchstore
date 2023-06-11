<?php
session_start();

function upload_foto($ft){
    $target_dir = "img/";
    $target_file = $target_dir . basename($ft["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // check if file already exist
    if(file_exists($target_file)){
        echo "Sorry, file already exist<br>";
        $uploadOk = 0;
    }

    // check file size
    if($ft["size"]>500000){
        echo "Sorry, your file is too large<br>";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != jpeg && $imageFileType != "gif"){
        echo "Sorry, only JPGM JPEGM PNG & GIF files are allowed<br>";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if($uploadOk == 0){
        echo "Sorry, your file was not uploaded<br>";
        //if everything is ok, try to upload file
    }else{
        if(move_uploaded_file($ft["tmp_name"], $target_file)){
            return true;
        }else{
            return false;
        }
    }
}
?>