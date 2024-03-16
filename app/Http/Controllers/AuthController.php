<?php

namespace App\Http\Controllers;

use App\Services\AuthService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    private $AuthService;

    public function __construct(AuthService $authService)
    {
        $this->AuthService = $authService;
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            $response = [
                'result' => false,
                'data' => $validator->errors()->first()
            ];
            return response()->json($response, 200);
        }

        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');

        $this->AuthService->register($name, $email, $password);
        $response = [
            'result' => true,
            'data' => 'Usuari registrat correctament'
        ];
        return response()->json($response, 201);
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()->first()], 400);
        }

        $email = $request->input('email');
        $password = $request->input('password');
        $remember = $request->input('remember');
        $resp = $this->AuthService->login($email, $password, $remember);
        if (!$resp['result']) {
            $mess = $resp['data'];
            return $this->respond($resp);
        }

        return  $this->respond($resp);
    }

    public function refresh()
    {
        $result = $this->AuthService->refreshToken();
        return $this->respond($result);
    }

    public function logout()
    {
        try{
        $this->AuthService->logout();
        return response()->json(['message' => 'Successfully logged out']);
        }
        catch(Exception $ex) {
            return response()->json(['message' => $ex->getMessage()]);
        }
    }

    public function user(){
        $result = $this->AuthService->me();        
        return response()->json($result,200);
    }

    public function requestPasswordReset(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()->first()], 400);
        }

        $email = $request->input('email');

        $this->AuthService->requestPasswordReset($email);

        return response()->json(['message' => 'Password reset email sent']);
    }

    public function resetPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'token' => 'required|string',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()->first()], 400);
        }

        $token = $request->input('token');
        $password = $request->input('password');

        if (!$this->AuthService->resetPassword($token, $password)) {
            return response()->json(['message' => 'Invalid or expired password reset token'], 400);
        }

        return response()->json(['message' => 'Password reset successfully']);
    }    

    protected function respond($result)
    {
        return response()->json($result);
    }
}