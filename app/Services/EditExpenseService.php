<?php

namespace App\Services;

use App\Exceptions\NotEditRegisterException;
use App\Models\Data;

class EditExpenseService
{
    public function editExpense(array $request, string $userId): void
    {
        $model = new Data();
        $userIdAuth = $request['IdUserData'];
        $register = $model->getOneDataTable($userId);
        var_dump($userIdAuth, $register['data'][0]['IdUserData']);
        if($userIdAuth != $register['data'][0]['IdUserData']){
            throw new NotEditRegisterException(); 
        }
        $model->updateExpense($request, $userId);
        return;
    }

}
