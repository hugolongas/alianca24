<?php

namespace App\Http\Controllers;

use App\Models\Cover;
use App\Services\CoverService;
use Illuminate\Http\Request;

use Validator;

class CoverController extends Controller
{
    protected $CoverService;

    public function __construct(CoverService $coverService)
    {
        $this->CoverService = $coverService;
    }

    public function GetCovers()
    {
        $covers = $this->CoverService->GetCovers();
        return $covers;
    }

    public function All()
    {
        $covers = $this->CoverService->All();
        return response()->json($covers, 200);
    }

    public function Create()
    {
        $cover = $this->CoverService->Create();
        return response()->json($cover,200);
    }

    public function Get($id){
        $cover = $this->CoverService->GetById($id);
        return response()->json($cover,200);
    }

    public function Update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()->first()], 400);
        }

        $id = $request->id;
        $title = $request->title;
        $url = $request->url;

        $result = $this->CoverService->Update($id, $title, $url);
        return response()->json($result, 200);
    }

    public function GetAttachmentsById($id){
        $result = $this->CoverService->GetAttachmentsById($id);
        return response()->json($result,200);
    }

    public function Delete($id){
        $result = $this->CoverService->Delete($id);
        return response()->json($result, 200);
    }
}
