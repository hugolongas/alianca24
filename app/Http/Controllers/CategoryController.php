<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Services\CategoryService;
use Illuminate\Http\Request;

use Validator;

class CategoryController extends Controller
{
    protected $CategoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->CategoryService = $categoryService;
    }

    
    public function All()
    {
        $categories = $this->CategoryService->All();
        return response()->json($categories, 200);
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

        $result = $this->CategoryService->Create($name);
        return ($result);
    }

    public function Get($id)
    {
        $category = $this->CategoryService->GetById($id);
        return response()->json($category, 200);
    }

    public function Update(Category $category)
    {
        $result = $this->CategoryService->Update($category);
        return response()->json($result, 200);
    }

    public function Update1(Request $request)
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

        $result = $this->CategoryService->Update1($id, $name);
        return response()->json($result, 200);
    }

    public function Delete($id){
        $result = $this->CategoryService->Delete($id);
        return response()->json($result, 200);
    }
}
