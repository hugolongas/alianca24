<?php

namespace App\Services;

use App\Models\Activity;
use App\Models\Category;

use Carbon\Carbon;


use App\Services\MediaService;

class ActivityService extends Service
{
    private $MediaService;

    public function __construct(MediaService $mediaService)
    {
        $this->MediaService = $mediaService;
    }

    public function GetAll()
    {
        $activities = Activity::orderBy('date', 'desc')->get();
        return $this->OkResult($activities);
    }

    public function GetAllByDate($date)
    {
        if ($date != '') {
            $activities = Activity::with('attachments')->orderBy('date', 'asc')->where('date', '=', $date)->where('published', true)->get();
            return $activities;
        }

        $activities = Activity::with('attachments')->orderBy('date', 'asc')->where('date', '>=', Carbon::today())->where('published', true)->get();
        return $activities;
    }
    
    public function GetById($id)
    {
        $activity = Activity::with('category')->find($id);    
        $activity->slug();    
        return $this->OkResult($activity);
    }

    public function GetByUrl($url)
    {
        $activity = Activity::with('attachments')->where('url', $url)->first();
        return $activity;
    }

    public function ByDate($year, $month)
    {
        $activities = Activity::orderBy('date', 'asc')
            ->whereRaw("(MONTH(date) = $month AND YEAR(date) = $year)")
            ->where('published', true)->get();
        return $activities;
    }

    public function GetActiveCount($count = 4)
    {
        $activities = Activity::with('attachments')->orderBy('date', 'asc')->where('date', '>=', Carbon::today())->where('published', true)->take($count)->get();       

        return $activities;
    }

    public function Create($title, $category)
    {
        $activity = new Activity();
        $activity->title = $title;
        $activity->category_id = $category;
        $activity->summary = '';
        $activity->description = '';
        $activity->category_id = $category;
        $activity->published = false;
        $activity->save();


        $url =$this->_SeoUrl($activity->title). "_" . $activity->id;
        $activity->url = $url;

        $activity->save();

        return $this->OkResult($activity);
    }

    public function Update($id, $title, $summary, $description, $categoryId, $date, $time, $price, $buyUrl)
    {
        $date = str_replace('/', '-', $date);
        $date = date('Y-m-d', strtotime($date));
        if ($description == null) $description = "";
        if ($buyUrl == null) $buyUrl = "";

        $activity = Activity::find($id);
        $activity->title = $title;
        $activity->summary = $summary;
        $activity->description = $description;
        $activity->category_id = $categoryId;
        $activity->date = $date;
        $activity->time = $time;
        $activity->price = $price;
        $activity->buy_url = $buyUrl;
        $activity->save();

        return $this->GetById($id);
    }

    public function GetAttachmentsById($id){
        $attachments = $this->MediaService->GetAttachmentsByActivityId($id);
        return $this->OkResult($attachments);
    }

    public function AddAttachment($id, $media, $mediaDefinition, $cropInfo)
    {
        $attachment = $this->MediaService->CreateAttachment( $media, $mediaDefinition, $cropInfo);

        $activity = Activity::find($id);
        $activity->attachments()->attach($attachment);
        $activity->save();

        return $this->OkResult($attachment);
    }

    public function RemoveAttachment($id, $attachId)
    {
        $activity = Activity::find($id);
        $activity->attachments()->dettach($attachId);
        $activity->save();

        $result = $this->MediaService->RemoveAttachmentById($attachId);
        return $this->OkResult($result);
    }

    public function Delete($id)
    {
        $activity = Activity::find($id);
        $attachments = $activity->attachments;
        foreach ($attachments as $attachment) {
            $this->MediaService->RemoveAttachment($attachment);
        }
        $activity->delete();
        return $this->OkResult(true);
    }

    public function Publish($id, $status)
    {
        $activity = Activity::find($id);
        $activity->Published = $status;
        $activity->save();        
        return $this->GetById($id);
    }

    /*Private Functions*/
    private function _SeoUrl($string)
    {
        //Lower case everything
        $finalString = strtolower($string);
        //Make alphanumeric (removes all other characters)
        $finalString = preg_replace("/[^a-z0-9_\s-]/", "", $finalString);
        //Clean up multiple dashes or whitespaces
        $finalString = preg_replace("/[\s-]+/", " ", $finalString);
        //Convert whitespaces and underscore to dash
        $finalString = preg_replace("/[\s_]/", "-", $finalString);
        return $finalString;
    }
    /*End Private Functions*/
}
