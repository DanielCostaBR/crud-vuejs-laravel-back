<?php

namespace App\Http\Controllers;

use App\Http\Requests\VerifyPermissionRequest;
use App\Services\VerifyPermissionService;
use Exception;

class VerifyPermissionController extends Controller
{
    public function verifyPermissionEdit(VerifyPermissionRequest $request, string $id) 
    {
        try {   
            $service = new VerifyPermissionService();
            $data = $request->validated();
            $service->verifyPermissionEdit($data, $id);
            return response()->json(['Type' => true]);
        } catch (Exception $e) {
            return array(
                'message' => $e->getMessage(),
                'status' => $e->getCode()
            );
        }
    }
}
