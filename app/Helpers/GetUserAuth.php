<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Auth;

class GetUserAuth
{
    public function getUserId(): string
    {
        return Auth::id();
    }

    public function getInfoUser(): object
    {
        return Auth::user();
    }
}
