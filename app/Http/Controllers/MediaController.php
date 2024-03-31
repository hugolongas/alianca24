<?php

namespace App\Http\Controllers;

use App\Services\ActivityService;
use App\Services\CoverService;
use Illuminate\Http\Request;

use Validator;

class MediaController extends Controller
{
    protected $ActivityService;
    protected $CoverService;

    public function __construct(ActivityService $activityService, CoverService $coverService)
    {
        $this->ActivityService = $activityService;
        $this->CoverService = $coverService;
    }

    public function AddAttachment(Request $request)
    {
        $id = $request->id;
        $attachment = (object)$request->image;        
        $mediaDefinition = (object)$request->mediaDefinition;
        $cropInfo = (object)$request->cropInfo;
        
        if($mediaDefinition->used=='activity'){
            $result = $this->ActivityService->AddAttachment($id, $attachment, $mediaDefinition, $cropInfo);
        }
        if($mediaDefinition->used=='cover'){
            $result = $this->CoverService->AddAttachment($id, $attachment, $mediaDefinition, $cropInfo);
        }

        
        return response()->json($result, 200);
    }

    public function RemoveAttachment($id)
    {
        $result = $this->ActivityService->RemoveAttachment($id);
        return response()->json($result, 200);
    }
}
