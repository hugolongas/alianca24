<?php

namespace App\Services;

use App\Models\Attachment;
use App\Models\MediaDefinition;
use Storage;
use Intervention\Image\ImageManagerStatic as Image;

class MediaService extends Service
{
    private $_MediaPath;
    public function __construct()
    {
        $this->_MediaPath = 'media/';
    }

    public function CreateAttachment($activityId,  $media, $mediaDefinition, $cropInfo)
    {
        $attachment = new Attachment();
        $mediaFile = $media->data;
        $image = Image::make($mediaFile);
        $extension = $this->_GetExtension($image->mime());
        $resizedImage = $image
            ->crop($cropInfo->width, $cropInfo->height, $cropInfo->left, $cropInfo->top)
            ->resize($mediaDefinition->width, $mediaDefinition->height)
            ->encode($extension, 90);;
        $hash = md5($resizedImage->__toString());
        $attachmentName = $hash . '.' . $extension;
        $filePath = $this->_MediaPath . $attachmentName;

        Storage::disk('public')->put($filePath, $resizedImage);
        $attachment->activity_id = $activityId;
        $attachment->mediadefinition_id = $mediaDefinition->id;
        $attachment->name = $attachmentName;
        $attachment->extension = $extension;
        $attachment->width = $mediaDefinition->width;
        $attachment->height = $mediaDefinition->height;
        $attachment->url = $filePath;
        $attachment->save();

        return $attachment;
    }

    public function GetMediaDefinitions()
    {
        $mediaDefinition = MediaDefinition::all();
        return $this->OkResult($mediaDefinition);
    }

    public function RemoveAttachmentById($id)
    {
        $attachment = Attachment::findOrFail($id);
        Storage::disk('public')->delete($attachment->url);
        $attachment->delete();
        return true;
    }

    public function GetAttachmentsByActivityId($activityId)
    {
        $attachmemts = Attachment::where("activity_id", $activityId)->get();

        $result = array();
        $items = $attachmemts->Count();
        foreach ($attachmemts as $attach) {
            $mediaDefinition = $attach->mediaDefinition;
            if ($attach != null) $result[$mediaDefinition->type] = $attach;
        }
        return $result;
    }

    private function _GetExtension($mime)
    {
        if ($mime == 'image/jpeg')
            return 'jpg';
        elseif ($mime == 'image/png')
            return 'png';
        elseif ($mime == 'image/gif')
            return 'gif';
        else
            return 'jpg';
    }
}
