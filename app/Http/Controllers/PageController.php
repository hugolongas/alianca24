<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ActivityService;
use App\Services\ParnerService;
use App\Services\CoverService;

class PageController extends Controller
 {
    protected $ActivityService;
    protected $CoverService;
    protected $ParnerService;

    public function __construct( ActivityService $activityService,
    CoverService $coverService, ParnerService $parnerService ) {
        $this->ActivityService = $activityService;
        $this->CoverService = $coverService;
        $this->ParnerService = $parnerService;
    }

    public function index()
 {
        $activities = $this->ActivityService->GetActiveCount();

        $covers = $this->CoverService->GetCovers();
        $parners = $this->ParnerService->GetParners();
        return view( 'home' )
        ->with( 'activities', $activities )
        ->with( 'covers', $covers )
        ->with( 'parners', $parners );
    }

    public function activities( Request $request )    
 {
        $date = $request->input( 'date' );
        $activitites = $this->ActivityService->GetAllByDate( $date );
        return view( 'activities' )->with( 'activities', $activitites );
    }

    public function Getactivity ( $slug )
 {
        $activity = $this->ActivityService->GetByUrl( $slug );
        return view( 'activity' )->with( 'activity', $activity );
    }

    public function socis() {

        $parners = $this->ParnerService->GetParners();
        return view( 'socis' )->with( 'parners', $parners );
    }
    
    public function inscripcio($id)
    {
        $parner = $this->ParnerService->GetParner($id);
        return view( 'inscripcio-socis' )->with( 'parner', $parner );
    }

    public function services() {
        return view( 'serveis' );
    }

    public function contact() {
        return view( 'contact' );
    }

    public function page()
 {
        $param = request()->segment( count( request()->segments() ) );

        return view( 'pages.'.$param )->with( 'page', $param );
    }
}
