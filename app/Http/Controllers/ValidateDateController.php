<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValidateDateRequest;
use App\Services\ValidateDateService;
use Exception;

class ValidateDateController extends Controller
{

    public function validateDate(ValidateDateRequest $request)
    {
        try {
            $service = new ValidateDateService();
            $data = $request->validated();
            $service->validateDate($data['createdAt']);
            return response()->json(['Type' => true]);
        } catch (Exception $e) {
            return array(
                'message' => $e->getMessage(),
                'status' => $e->getCode()
            );
        }
    }
}
