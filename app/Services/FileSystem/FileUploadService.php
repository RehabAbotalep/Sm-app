<?php


namespace App\Services\FileSystem;


use App\Http\Resources\MediaResource;
use App\Models\TemporaryUpload;

class FileUploadService
{
    public function upload()
    {
        $temporaryUpload = TemporaryUpload::create();

        $temporaryUpload
            ->addMultipleMediaFromRequest(['files'])
            ->each(function ($fileAdder) {
                $fileAdder->toMediaCollection();
            });
        return MediaResource::collection($temporaryUpload->media);
    }
}
