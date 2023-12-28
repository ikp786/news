<?php

namespace App\Traits;

use Illuminate\Support\Facades\File;

trait FileUploadTrait
{
    public function uploadFile($file, $folder)
    {
        // Generate a unique file name
        $originalFileName = $file->getClientOriginalName();
        $cleanedFileName = preg_replace('/[^A-Za-z0-9.]/', '', $originalFileName);
        $fileName = time() . '_' . $cleanedFileName;
        // check if file directory not available then create a new directory
        $this->createDirectory($folder);
        // Move the uploaded file to the specified folder
        $file->move($folder, $fileName);
        // Return the file path
        return $fileName;
    }

    private function createDirectory($folder)
    {
        // Create the directory if it doesn't exist
        if (!File::isDirectory($folder)) {
            File::makeDirectory($folder, 0777, true, true);
        }
    }

    function uploadBase64File($base64Data, $folder)
    {
        // Extract the file extension from the base64 data
        $extension = explode('/', mime_content_type($base64Data))[1];
        // check if file directory not available then create a new directory
        $this->createDirectory($folder);
        // Generate a unique file name
        $fileName = time() . rand(1000, 9999) . '_profile_pic.' . $extension;

        // Decode and save the base64 data as a file
        file_put_contents($folder . '/' . $fileName, base64_decode(explode(',', $base64Data)[1]));

        // Return the file path
        return $fileName;
    }
}
