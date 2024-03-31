<?php

namespace App\Services;

use App\Models\Cover;

use App\Services\MediaService;

class CoverService extends Service
{
    private $MediaService;

    public function __construct(MediaService $mediaService)
    {
        $this->MediaService = $mediaService;
    }

    public function GetCovers()
    {
        $covers = Cover::with('attachments')->get()->sortBy("position");
        $pair = $covers->count() % 2;

        foreach ($covers as $i => $cover) {
            if ($i == 0) {
                $cover->SetCss(12);
            } else if ($pair == 0 && $i == 1) {
                $cover->SetCss(12);
            } else {
                $cover->SetCss(6);
            }
        }
        return $covers;
    }

    public function All()
    {
        $covers = Cover::all();
        return $this->OkResult($covers);
    }

    public function GetById($id)
    {
        $cover = Cover::find($id);
        return $this->OkResult($cover);
    }

    public function Create()
    {
        $count = Cover::count();
        $cover = new Cover();
        $cover->title = '';
        $cover->position = $count + 1;
        $cover->save();

        return $this->OkResult($cover);
    }

    public function Update($id, $title, $url)
    {
        $cover = Cover::find($id);
        $cover->title = $title;
        $cover->url = $url;
        $cover->save();
        return $this->OkResult($cover);
    }

    public function AddAttachment($id, $media, $mediaDefinition, $cropInfo)
    {
        $attachment = $this->MediaService->CreateAttachment($media, $mediaDefinition, $cropInfo);

        $cover = Cover::find($id);
        $cover->attachments()->attach($attachment);
        $cover->save();

        return $this->OkResult($attachment);
    }

    public function RemoveAttachment($id)
    {
        $result = $this->MediaService->RemoveAttachmentById($id);
        return $this->OkResult($result);
    }

    public function Delete($id)
    {
        $category = Cover::find($id);
        $category->delete();
        return $this->OkResult(true);
    }

    public function GetAttachmentsById($id)
    {
        $attachments = $this->MediaService->GetAttachmentsByCoverId($id);
        return $this->OkResult($attachments);
    }


    /*End Private Functions*/
}
