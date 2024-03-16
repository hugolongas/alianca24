<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;

class AuthService extends Service
{
    public function __construct()
    {
    }

    public function register($name, $email, $password)
    {
        $user = new User([
            'name' => $name,
            'email' => $email,
            'password' => \Hash::make($password),
        ]);

        $user->email_verified_at = now();
        $user->save();
    }

    public function login($email, $password, $remember)
    {
        $credentials = ['email' => $email, 'password' => $password];

        if (!$token = auth()->attempt($credentials)) {
            return $this->FailResponse("L'Usuari o contrasenya es incorrecte");
        }
        $user =  auth()->user();
        if ($user->email_verified_at == null) return $this->FailResponse('Usuari no verificat');
        $result =
            [
                'user' => $user,
                'access_token' => $token,
                'token_type' => 'bearer',
                'expires_in' => auth()->factory()->getTTL() * ($remember ? 2800 : 60)
            ];
        return $this->OkResult($result);
    }

    public function refreshToken()
    {
        $token = auth()->refresh();
        $result =
            [
                'access_token' => $token,
                'token_type' => 'bearer',
                'expires_in' => auth()->factory()->getTTL() * 60
            ];
        return $result;
    }

    public function logout()
    {
        auth()->logout();
        return $this->OkResult(true);
    }

    public function me()
    {
        $user =  auth()->user();
        return $this->OkResult($user);
    }

    public function requestPasswordReset($email)
    {
        $user = User::where('email', $email)->first();

        if ($user) {
            $this->sendPasswordResetEmail($user);
        }
    }

    public function resetPassword($token, $password)
    {
        try {
            $decrypted = Crypt::decryptString($token);
            list($userId, $createdAt) = explode('|', $decrypted);

            if ($this->isTokenExpired($createdAt)) {
                return false;
            }

            $user = User::find($userId);

            if (!$user) {
                return false;
            }

            $user->password = \Hash::make($password);
            $user->save();

            return true;
        } catch (\Throwable $e) {
            return false;
        }
    }

    private function isTokenExpired($createdAt)
    {
        $expiresAt = Carbon::parse($createdAt)->addMinutes(5);

        return now()->greaterThan($expiresAt);
    }

    private function generatePasswordResetToken($userId)
    {
        $token = Crypt::encryptString("{$userId}|" . now());

        return urlencode($token);
    }

    private function sendPasswordResetEmail(User $user)
    {
        $token = $this->generatePasswordResetToken($user->id);
        // Code to send password reset email to the user with the $token
    }
}
