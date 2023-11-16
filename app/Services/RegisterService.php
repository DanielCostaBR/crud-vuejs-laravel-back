<?php

namespace App\Services;

use App\Exceptions\ExistEmailException;
use App\Exceptions\PasswordDifferentException;
use App\Models\Users;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class RegisterService
{
    private $users;

    public function __construct()
    {
        $this->users = new Users();
    }

    public function validationsToRegister($request): bool
    {
        $this->validateEmailExist($request['email']);
        $this->validatePassword($request['password'], $request['confirmPassword']);
        return $this->users->insert($this->registerAccountArrayTreated($request));
    }

    private function validateEmailExist(string $email)
    {
        $model = new Users();
        $hasExistEmail = $model->getUserByEmail($email);
        
        if (empty($hasExistEmail[0]['email'])) {
            return true;
        }
        if ($email == $hasExistEmail[0]['email']) {
            throw new ExistEmailException();
        };
    }
    
    private function validatePassword($password, $confirmPassword): void
    {
        if ($password != $confirmPassword) {
            throw new PasswordDifferentException;
        }
    }

    public function registerAccountArrayTreated($request): array
    {
        return array(
            'name' => $request['name'],
            'email' => $request['email'],
            'email_verified_at' => now(),
            'password' => Hash::make($request['password']),
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        );
    }
}
