<?php

namespace app\Core;

class FileUploader
{

    //TODO : Handle File Upload lebih baik lagi, mungkin validasi dll
    // Return 0 jika terjadi error
    public static function HandleImageUpload($fieldName) : FileUploadInfo
    {
        $dir = __DIR__."/assets/images/";
        $allowedFileExt = array('png', 'jpg', 'jpeg');

        $fileName = $_FILES[$fieldName]['name'];
        $fileType = $_FILES[$fieldName]['type'];
        $fileSize = $_FILES[$fieldName]['size'];
        $tmpName = $_FILES[$fieldName]['tmp_name'];
        $error = $_FILES[$fieldName]['error'];
        if($error != 0)
            return new FileUploadInfo(false, "");

        $ext = explode(".", $fileName);
        $fileExt = strtolower(end($ext));
        if(!in_array($fileExt, $allowedFileExt))
            return new FileUploadInfo(false, "");

        $newFileName = uniqid("image-", true);

        $filePath = $dir.$newFileName;
        move_uploaded_file($tmpName, $filePath);


        return new FileUploadInfo(true, $newFileName);
    }
}