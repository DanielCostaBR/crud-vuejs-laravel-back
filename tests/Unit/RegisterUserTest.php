<?php

namespace Tests\Unit;

use Tests\TestCase;

class RegisterUserTest extends TestCase
{

    public function test_registered_user_is_correct(): void
    {
        $userObject = [
            'email' => 'danielteste123@gmail.com', 
            'password' => '123123', 'confirmPassword' => 
            '123123'
        ];
        $response = $this->post('/api/register', $userObject);
        $response->assertStatus(200);
    }
}
