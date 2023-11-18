<?php

namespace App\Services;

use App\Exceptions\NotEditRegisterException;
use App\Helpers\DecodeJWT;
use App\Models\Data;

class VerifyPermissionService
{
    public function verifyPermissionEdit(array $request, string $userId): void
    {
        $helpers = new DecodeJWT();
        $userIdAuth = $helpers->decodeJWT($request['token']);
        $model = new Data();
        $register = $model->getOneDataTable($userId);
        if(empty($register)){
            return;
        }
        if($register['data'][0]['IdUserData'] != $userIdAuth){
            throw new NotEditRegisterException();
        }
    }
}
