<?php

class ImageUploader
{
    private $img = "";
    private $uploadPath = "";

    public function __construct($imgFile,$uploadDir)
    {
        $this->img = $imgFile;
        $this->uploadPath = $uploadDir;
    }


    public function imageUpload()
    {
        $is_file_uploaded = move_uploaded_file($this->img["tmp_name"],$this->uploadPath); // move image file to local uploads folder 

        if ($is_file_uploaded) // upload the file from folder to s3 bucket
        {
            return true;
        
        }

        else
        {
            return false;
        }


    }

    public function getUploadPath()
    {
        return $this->uploadPath;
    }



}