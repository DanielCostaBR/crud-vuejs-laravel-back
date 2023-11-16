<?php

namespace App\Http\Controllers;

use App\Helpers\SendEmail;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterExpenseRequest;
use App\Services\RegisterExpenseService;
use Exception;

class RegisterExpenseController extends Controller
{

    public function registerExpense(RegisterExpenseRequest $request)
    {
        try {
            $service = new RegisterExpenseService();
            $helpers = new SendEmail();
            $data = $request->validated();
            $service->registerExpense($data);
            $helpers->store($request['email']);
            return response()->json(['Type' => true]);
        } catch (Exception $e) {
            return array(
                'message' => $e->getMessage(),
                'status' => $e->getCode()
            );
        }
    }
}
