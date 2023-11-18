<?php

namespace Tests\Unit;

use Tests\TestCase;

class RegisterExpenseTest extends TestCase
{

    public function test_registered_expense_is_correct(): void
    {
        $userObject = [
            "email" => "danielcostacpt@gmail.com",
            "value" => "123",
            "description" => "123123", 
            "createdAt" => "10/10/2023",
            "token" => "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYXBpL2xvZ2luIiwiaWF0IjoxNjk5OTgyNDgyLCJleHAiOjE2OTk5ODYwODIsIm5iZiI6MTY5OTk4MjQ4MiwianRpIjoiaXlFV3dOVldRZm16TVBQTiIsInN1YiI6IjIiLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.LkIrRXbmnGwqDOao7FO2IC9-dclpjJfKMMaGlwGVO4Q"
        ];
        $response = $this->post('/api/register-expense', $userObject);
        $response->assertStatus(200);
    }
}
