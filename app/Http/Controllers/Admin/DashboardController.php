<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Associate;
use App\Models\Course;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    function test()
    {
        return view('test');

    }
    function index()
    {
        return view('backend.dashboard');
    }

    public function cropImageUploadAjax(Request $request)
    {
        $folderPath = public_path('uploads/');
 
        $image_parts = explode(";base64,", $request->image);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
 
        $imageName = uniqid() .'.'. $image_type;
 
        $imageFullPath = $folderPath.$imageName;
 
        $save = file_put_contents($imageFullPath, $image_base64);
        dd($save);
 
        //  $saveFile = new CropImage;
        //  $saveFile->name = $imageName;
        //  $saveFile->save();
    
        return response()->json(['success'=>'Crop Image Uploaded Successfully']);
    }

}
