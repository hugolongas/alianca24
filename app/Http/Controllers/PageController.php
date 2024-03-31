<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ActivityService;
use App\Services\CoverService;

class PageController extends Controller
{
    protected $ActivityService;
    protected $CoverService;
    public function __construct(ActivityService $activityService, CoverService $coverService)
    {
        $this->ActivityService = $activityService;
        $this->CoverService = $coverService;
    }

    public function index()
    {
        $activities = $this->ActivityService->GetActiveCount();     
        $covers = $this->CoverService->GetCovers();
        return view('home')->with('activities',$activities)->with("covers",$covers);
    }
    
    public function activities(Request $request)    
    {
        $date = $request->input('date');
        $activitites = $this->ActivityService->GetAllByDate($date);
        return view('activities')->with('activities', $activitites);
    }

    public function Getactivity ($slug)
    {
        $activity = $this->ActivityService->GetByUrl($slug);
        return view('activity')->with('activity', $activity);
    }

    public function socis()
    {
        return view('socis');
    }

    public function services(){
        return view('serveis');
    }

    public function contact(){
        return view('contact');
    }

    public function page()
    {
        $param = request()->segment(count(request()->segments()));        
        return view("pages.".$param)->with('page',$param);
    }
}
