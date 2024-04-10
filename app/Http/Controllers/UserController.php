<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

use Validator;

use App\Services\UserService;

class UserController extends Controller
{
    private $UserService;


    public function __construct(UserService $userService)
    {
        $this->UserService = $userService;
    }

    public function all()
    {
        $users = $this->UserService->all();
        return response()->json($users, 200);
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:6',
            'role' => 'required',
        ]);

        if ($validator->fails()) {
            $response = [
                'success' => false,
                'result' => $validator->errors()
            ];
            return response()->json($response, 200);
        }

        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');
        $role = $request->input('role');

        $response =  $this->UserService->Create($name, $email, $password, $role);

        return response()->json($response, 201);
    }

    public function Get($id)
    {
        $user = $this->UserService->GetById($id);
        return response()->json($user, 200);
    }

    public function Update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'name' => 'required',
            'email' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()->first()], 400);
        }

        $id = $request->id;
        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');

        $result = $this->UserService->Update($id, $name, $email, $password);
        return response()->json($result, 200);
    }

    public function Delete($id)
    {
        $result = $this->UserService->Delete($id);
        return response()->json($result, 200);
    }
}
