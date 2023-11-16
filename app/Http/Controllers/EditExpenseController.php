<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\EditExpenseRequest;
use App\Services\EditExpenseService;
use Exception;

class EditExpenseController extends Controller
{

    public function editExpense(EditExpenseRequest $request, string $id) 
    {
        try {
            $service = new EditExpenseService();
            $data = $request->validated();
            $service->editExpense($data, $id);
            return response()->json(['Type' => true]);
        } catch (Exception $e) {
            return array(
                'message' => $e->getMessage(),
                'status' => $e->getCode()
            );
        }
    }
}
