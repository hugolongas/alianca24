<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;

use App\Models\Attachment;
use Storage;
use Image;

class MediaService extends Service
{
    private $_MediaPath;
    public function __construct()
    {
        $this->_MediaPath = 'media/';
    }

    public function CreateAttachment($activityId, $img, $type, $width, $height)
    {
        $attachment = new Attachment();

        $resizedImage = Image::make($img->getRealPath())->resize($width, $height)->encode('jpg');
        $hash = md5($resizedImage->__toString());
        $attachmentName = $hash . '.' . $img->getClientOriginalExtension();
        $filePath = $this->_MediaPath . $attachmentName;

        Storage::disk('public')->put($filePath, $resizedImage);

        $attachment->name = $attachmentName;
        $attachment->activity_id = $activityId;
        $attachment->type = $type;
        $attachment->width = $width;
        $attachment->height = $height;
        $attachment->url = $filePath;
        $attachment->save();

        return $attachment;
    }

    public function RemoveAttachmentById($id){
        $attachment = Attachment::findOrFail($id);
        Storage::disk('public')->delete($attachment->url);
        $attachment->delete();
        return true;
    }

    public function RemoveAttachment($attachment){        
        Storage::disk('public')->delete($attachment->url);
        $attachment->delete();
        return true;
    }
}
