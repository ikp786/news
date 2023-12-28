<?php

use Illuminate\Support\Facades\Log;

if (!function_exists('getUuid')) {
    function getUuid()
    {
        $query = DB::select('select uuid() AS uuid');
        return $query[0]->uuid;
    }
}

if (!function_exists('createLog')) {
    function createLog($message)
    {
        Log::info($message);
    }
}

if (!function_exists('createDirectory')) {
    function createDirectory($folderName)
    {
        $uploadFolder = config('constants.upload_path');
        if (!is_dir($uploadFolder)) {
            mkdir($uploadFolder, 0777, true);
            chmod($uploadFolder, 0777);
        }
        $moduleFolder = $uploadFolder . '/' . $folderName;
        if (!is_dir($moduleFolder)) {
            mkdir($moduleFolder, 0777, true);
            chmod($moduleFolder, 0777);
        }
        return $moduleFolder . '/';
    }
}
