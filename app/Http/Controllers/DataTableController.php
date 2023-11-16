<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\DataTableRequest;
use App\Services\DataTableService;

class DataTableController extends Controller
{
    
    public function getAllRegisters(DataTableRequest $request)
    {
        $service = new DataTableService();
        return $service->getAllDataTable($request);
    }

    public function getAllOneRegister(string $id): array
    {
        $service = new DataTableService();
        return $service->getOneDataTable($id);
    }

    public function delete(string $id): object
    {
        $service = new DataTableService();
        $service->deleteRegister($id);
        return response()->json(['Type' => true]);
    }
}
