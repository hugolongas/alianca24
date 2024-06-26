<?php

namespace App\Http\Controllers;

use App\Services\MediaService;
use Illuminate\Http\Request;


class MediaDefinitionController extends Controller
{
    protected $MediaService;

    public function __construct(MediaService $mediaService)
    {
        $this->MediaService = $mediaService;
    }

    
    public function All()
    {
        $categories = $this->MediaService->GetMediaDefinitions();
        return response()->json($categories, 200);
    }

    public function GetForActivity()
    {
        $categories = $this->MediaService->GetMediaDefinitionsForActivities();
        return response()->json($categories, 200);
    }

    public function GetForCover()
    {
        $categories = $this->MediaService->GetMediaDefinitionsForCover();
        return response()->json($categories, 200);
    }
}
