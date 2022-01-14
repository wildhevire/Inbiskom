<?php

namespace app\Core;

class FileUploadInfo
{

    public bool $isSuccess;
    public string $filePath;

    public function __construct(bool $isSuccess, string $filePath)
    {
        $this->isSuccess = $isSuccess;
        $this->filePath = $filePath;

    }
}