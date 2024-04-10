<?php

namespace App\Services;

use App\Models\User;

class UserService extends Service
{
    private $AuthService;

    public function __construct(AuthService $authService)
    {
        $this->AuthService = $authService;
    }

    public function All()
    {
        $users = User::all();
        return $this->OkResult($users);
    }

    public function GetById($id)
    {
        $user = User::find($id);
        return $this->OkResult($user);
    }

    public function Create($name, $email, $password, $roleId)
    {
        $response =  $this->AuthService->register($name, $email, $password, $roleId);

        return $this->OkResult($response);
    }
    public function Update($id, $name, $email, $password)
    {
        $user = User::find($id);

        if (!$user) {
            return $this->FailResponse("No existeix l'Usuari");
        }

        $user->name = $name;
        $user->email = $email;
        if ($password != null) $user->password = \Hash::make($password);
        $user->save();

        return $this->OkResult($user);
    }

    public function Delete($id)
    {
        $user = User::find($id);

        $user->roles()->detach();
        $user->delete();
        return $this->OkResult(true);
    }
}
