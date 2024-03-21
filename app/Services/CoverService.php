<?php

namespace App\Services;

use App\Models\Activity;
use App\Models\Cover;

use App\Services\MediaService;
use App\Services\ActivityService;

class CoverService extends Service
{
    protected $ActivityService;

    public function __construct(ActivityService $activityService)
    {
        $this->ActivityService = $activityService;
    }

    public function GetCovers()
    {
        $covers = Cover::all();
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
        $cover->cover_type = "Cover";
        $cover->position = $count + 1;
        $cover->save();

        return $this->OkResult($cover);
    }

    public function Update($id, $title, $url)
    {
        $cover = Cover::find($id);
        $cover->title = $title;
        $cover->title = $url;
        $cover->save();
    }

    public function UpdateWithActivity($id, $activityId)
    {
        if ($activityId == null) return $this->FailResponse("Activitat no existeix");

        $activity = Activity::with('attachments')->find($activityId);

        $cover = Cover::find($id);
        $cover->title = $activity->title;
        $cover->title = $activity->url;
        $cover->img_url = $activity->attachments->where('mediadefinition.type', 'cover')->first()->url;
        $cover->save();

        return $this->OkResult($cover);
    }

    public function Delete($id)
    {
        $category = Cover::find($id);
        $category->delete();
        return $this->OkResult(true);
    }


    /*End Private Functions*/
}
