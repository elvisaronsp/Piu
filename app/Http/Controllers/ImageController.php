<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
use File;
use Illuminate\Contracts\Filesystem\FileNotFoundException;

class ImageController extends Controller
{
    public function show($folder, $fileName){
      try{
        $file = Storage::disk('local')->get($folder.'/'.$fileName);
        $type = Storage::mimeType($folder.'/'.$fileName);
        return response($file, 200)->header('Content-Type', $type);
      }catch(FileNotFoundException $e){
        return response($e->getMessage(), 404);
      }
    }
}
