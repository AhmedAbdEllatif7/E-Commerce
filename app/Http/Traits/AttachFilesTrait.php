<?php

namespace App\Http\Traits;

use Illuminate\Support\Facades\Storage;

trait AttachFilesTrait
{
    public function uploadFile($request,$name,$folder)
    {
        $image = $request->file($name)->getClientOriginalName();
        $request->file($name)->storeAs('attachments/',$folder.'/'.$image,'upload_attachments');

    }

    public function deleteFile($file_name)
    {
        $exists = Storage::disk('upload_attachments')->exists('attachments/upload_attachments/'.$file_name);

        if($exists)
        {
            Storage::disk('upload_attachments')->delete('attachments/upload_attachments/'.$file_name);
        }
    }
}
