<?php

use Illuminate\Support\Facades\File;


    //上傳檔案
    function upload_file($file,$floor=null){
        $extension = $file->getClientOriginalExtension();
        $floor_path = '/upload/'.$floor;
        $destinationPath = public_path() . $floor_path;

        $filename = $file->getFilename() . '.' . $extension;
        $url = $floor_path.'/'. $filename;

        $file->move($destinationPath, $filename);

        return $url;
    }

    //刪除檔案
    function delete_file($path){
        File::delete(public_path().$path);
    }
