<?php

namespace App\Http\Controllers;

use App\Models\Parner;
use App\Services\ParnerService;
use Illuminate\Http\Request;

class ParnerController extends Controller
{
    
    protected $ParnerService;

    public function __construct(ParnerService $parnerService)
    {
        $this->ParnerService = $parnerService;
    }

    
    public function All()
    {
        $parners = $this->ParnerService->All();
        return response()->json($parners, 200);
    }

    public function Create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()->first()], 400);
        }

        $name = $request->name;

        $result = $this->ParnerService->Create($name);
        return ($result);
    }

    public function Get($id)
    {
        $category = $this->ParnerService->GetById($id);
        return response()->json($category, 200);
    }

    public function Update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'name' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()->first()], 400);
        }

        $id = $request->id;
        $name = $request->name;
        $price = $request->price;
        $info = $request->info;

        $result = $this->ParnerService->Update($id, $name, $price, $info);
        return response()->json($result, 200);
    }

    public function Delete($id){
        $result = $this->ParnerService->Delete($id);
        return response()->json($result, 200);
    }
}
