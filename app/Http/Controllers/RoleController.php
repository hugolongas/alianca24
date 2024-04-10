<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Services\RoleService;
use Illuminate\Http\Request;

use Validator;

class RoleController extends Controller
{
    protected $RoleService;

    public function __construct(RoleService $roleService)
    {
        $this->RoleService = $roleService;
    }

    
    public function All()
    {
        $categories = $this->RoleService->All();
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

        $result = $this->RoleService->Create($name);
        return ($result);
    }

    public function Get($id)
    {
        $role = $this->RoleService->GetById($id);
        return response()->json($role, 200);
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

        $result = $this->RoleService->Update($id, $name);
        return response()->json($result, 200);
    }

    public function Delete($id){
        $result = $this->RoleService->Delete($id);
        return response()->json($result, 200);
    }
}
