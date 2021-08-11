<?php

namespace App\Http\Controllers;

use App\Services\FileSystem\FileUploadService;
use Illuminate\Http\Request;

class FileUploadController extends Controller
{
    /**
     * @var FileUploadService
     */
    private $fileUploadService;

    public function __construct(FileUploadService $fileUploadService)
    {
        $this->fileUploadService = $fileUploadService;
    }

    public function upload()
    {
        return $this->fileUploadService->upload();
    }
}
