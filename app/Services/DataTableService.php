<?php

namespace App\Services;

use App\Helpers\DecodeJWT;
use App\Http\Requests\DataTableRequest;
use App\Models\Data;

class DataTableService
{
    
    public function getAllDataTable(DataTableRequest $request)
    {
        $jwt = new DecodeJWT();
        $userId = $jwt->decodeJWT($request->token);
        $model = new Data();
        return $model->getAllDataTable($userId); 
    }

    public function getOneDataTable(string $id): array
    {
        $model = new Data();
        return $model->getOneDataTable($id);
    }

    public function deleteRegister(string $id): void
    {
        $model = new Data();
        $model->deleteRegister($id);
    }

}