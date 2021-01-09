<?php
include "includes/autoloader.inc.php";


$checkIMG = getimagesize($_FILES["upload"]["tmp_name"]);

$isImage = strtok($_FILES["upload"]["type"],"/");

    
    if ($isImage == "image" && $checkIMG !== false)
    {
        $imgFile = $_FILES["upload"];
        $url = 'uploads/'. $imgFile["name"];

        $imgUploader = new ImageUploader($imgFile,$url);
        
        if ($imgUploader->imageUpload() == true)
        {
            $function_number = $_GET['CKEditorFuncNum'];
            $message = "Upload was successful";

            echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($function_number,'$url','$message');</script>";

        }


    
    }


    else
    {
        $function_number = $_GET['CKEditorFuncNum'];
        $message = "Upload failed - not an image file!";
        $url = "";
        echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($function_number,'$url','$message');</script>";
    }
    


?>