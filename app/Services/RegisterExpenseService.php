<?php

namespace App\Services;

use App\Helpers\DecodeJWT;
use App\Models\Data;

class RegisterExpenseService
{
    public function registerExpense(array $request): void
    {
        $helpers = new DecodeJWT();
        $userId = $helpers->decodeJWT($request['token']);
        $model = new Data();
        $model->registerExpense($request, $userId);
    }
}
