<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;

use App\Models\Attachment;
use App\Models\MediaDefinition;
use Storage;
use Image;

class MediaService extends Service
{
    private $_MediaPath;
    public function __construct()
    {
        $this->_MediaPath = 'media/';       
    }

    public function CreateAttachment($activityId, $img, $type)
    {
        $md = $this->_GetMediaTypeByType($type);
        $attachment = new Attachment();

        $resizedImage = Image::make($img->getRealPath())->resize($md->width, $md->height)->encode('jpg');
        $hash = md5($resizedImage->__toString());
        $attachmentName = $hash . '.' . $img->getClientOriginalExtension();
        $filePath = $this->_MediaPath . $attachmentName;

        Storage::disk('public')->put($filePath, $resizedImage);

        $attachment->name = $attachmentName;
        $attachment->activity_id = $activityId;
        $attachment->type = $type;
        $attachment->width = $md->width;
        $attachment->height = $md->height;
        $attachment->url = $filePath;
        $attachment->save();

        return $attachment;
    }

    public function GetMediaDefinitions(){        
        $mediaDefinition = MediaDefinition::all();
        return $this->OkResult($mediaDefinition);
    }

    private function _GetMediaTypeByType($mediaType){
        return MediaDefinition::where('type',$mediaType);
    }

    public function RemoveAttachmentById($id){
        $attachment = Attachment::findOrFail($id);
        //Storage::disk('public')->delete($attachment->url);
        $attachment->delete();
        return true;
    }

    public function GetAttachmentsByActivityId($activityId) {
        
       $attachmemts = Attachment::where("activity_id",$activityId)->get();
        
        $result = array();
        $items = $attachmemts->Count();
        foreach ($attachmemts as $attach) {
            $mediaDefinition = $attach->mediaDefinition;
            if($attach!=null) $result[$mediaDefinition->type] = $attach;
        }
        return $result;        
    }
}
