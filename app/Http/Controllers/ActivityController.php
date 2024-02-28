<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Services\ActivityService;
use Illuminate\Http\Request;

use Validator;

class ActivityController extends Controller
{
    protected $ActivityService;

    public function __construct(ActivityService $activityService)
    {
        $this->ActivityService = $activityService;
    }

    public function calendarActivities($year, $month)
    {
        $activitites = $this->ActivityService->ByDate($year, $month);
        return $activitites;
    }

    public function Create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'category' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()->first()], 400);
        }

        $title = $request->title;
        $category = $request->category;

        $result = $this->ActivityService->Create($title, $category);
        return ($result);
    }

    public function Get($id)
    {
        $activity = $this->ActivityService->GetById($id);
        return response()->json($activity, 200);
    }


    public function GetByUr($slug)
    {
        $activity = $this->ActivityService->GetByUrl($slug);

        if ($activity != null)
            return view('activitat')->with('activitat', $activity[0]);
        else
            return response()->view('errors.404', [], 404);
    }

    public function AddAttachment(Request $request)
    {
        $id = $request->articleId;
        $attachment = $request->file('img');
        $attachmentType = $request->attachmentType;

        $result = $this->ActivityService->AddAttachment($id, $attachmentType, $attachment);
        return response()->json($result, 200);
    }

    public function RemoveAttachment(Request $request)
    {
        $attachId = $request->attachId;
        $result = $this->ActivityService->RemoveAttachment($attachId);
        return response()->json($result, 200);
    }

    public function Update(Activity $activity)
    {
        $result = $this->ActivityService->Update($activity);
        return response()->json($result, 200);
    }

    public function Update1(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'title' => 'required',
            'category' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()->first()], 400);
        }

        $id = $request->id;
        $title = $request->title;
        $category = $request->category;
        $summary = $request->summary;
        $description = $request->description;
        $date = $request->date;
        $time = $request->time;
        $price = $request->price;
        $buyUrl = $request->buyUrl;

        $result = $this->ActivityService->Update1($id, $title, $summary, $description, $category, $date, $time, $price, $buyUrl);
        return response()->json($result, 200);
    }
}
