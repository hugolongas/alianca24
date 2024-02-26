<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ActivityService;

class HomeController extends Controller
{
    protected $ActivityService;

    public function __construct(ActivityService $activityService)
    {
        $this->ActivityService = $activityService;
    }

    public function index()
    {
        $activities = $this->ActivityService->GetActiveCount();
        return view('home')->with('activities',$activities);
    }
    public function ateneu()
    {
        return view('ateneu');
    }
    public function socis()
    {
        return view('socis');
    }

    public function serveis(){
        return view('serveis');
    }

    public function contacte(){
        return view('contact');
    }
}
