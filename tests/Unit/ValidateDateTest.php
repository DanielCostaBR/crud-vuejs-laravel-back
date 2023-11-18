<?php

namespace Tests\Unit;

use Tests\TestCase;

class ValidateDateTest extends TestCase
{

    public function test_validade_date_is_correct(): void
    {
        $date = [
            "createdAt" => "12/31/2332" 
        ];
        $response = $this->post('/api/validate-date', $date);
        $response->assertStatus(302);
    }
}
