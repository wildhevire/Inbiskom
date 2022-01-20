<?php

namespace app\Core;

use app\Exception\UploadFailedException;

class FileUploader
{

    //TODO : Handle File Upload lebih baik lagi, mungkin validasi dll
    // Return 0 jika terjadi error
    public static function HandleImageUpload($fieldName) : ?FileUploadInfo
    {
        $dir = __DIR__."/../../public/assets/images/";
        $allowedFileExt = array('png', 'jpg', 'jpeg');

        $fileName = $_FILES[$fieldName]['name'];
        $fileType = $_FILES[$fieldName]['type'];
        $fileSize = $_FILES[$fieldName]['size'];
        $tmpName = $_FILES[$fieldName]['tmp_name'];
        $error = $_FILES[$fieldName]['error'];
        if($fileSize == 0){
            throw new UploadFailedException("no file - ".$fieldName);

        }
        if($error != 0)
            throw new UploadFailedException("ERROR");

        $ext = explode(".", $fileName);
        $fileExt = strtolower(end($ext));
        if(!in_array($fileExt, $allowedFileExt))
            throw new UploadFailedException("Forbidden");

        $newFileName = uniqid("image-", true);

        $filePath = $dir.$newFileName.".".$fileExt;
        move_uploaded_file($tmpName, $filePath);


        return new FileUploadInfo(true, $newFileName.".".$fileExt);
    }
}