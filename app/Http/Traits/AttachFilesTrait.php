<?php

namespace App\Http\Traits;

use Illuminate\Support\Facades\Storage;

trait AttachFilesTrait
{
    public function uploadFile($request,$name,$folder)
    {
        $image = $request->file($name)->getClientOriginalName();
        $request->file($name)->storeAs('attachments/',$folder.'/'.$image,'upload_attachments');
        return $image;

    }

    public function deleteFile($folder, $file_name)
    {
        $exists = Storage::disk('upload_attachments')->exists('attachments/'.$folder.'/'.$file_name);

        if($exists)
        {
            Storage::disk('upload_attachments')->delete('attachments/'.$folder.'/'.$file_name);
        }
    }
}
