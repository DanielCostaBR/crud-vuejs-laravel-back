<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Services\RegisterService;
use Exception;

class RegisterController extends Controller
{

    public function register(RegisterRequest $request)
    {
        try {
            $service = new RegisterService();
            $data = $request->validated();
            $service->validationsToRegister($data);
            return response()->json(['Type' => true]);
        } catch (Exception $e) {
            return array(
                'message' => $e->getMessage(),
                'status' => $e->getCode()
            );
        }
    }
}
