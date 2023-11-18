<?php

namespace Tests\Unit;

use Tests\TestCase;

class EditExpenseTest extends TestCase
{

    public function test_edit_expense_is_correct(): void
    {
        $object = [
            "userId" => "56",
            "IdUserData" => "49",
            "createdAt" => "11/11/2023",
            "description" => "abdcef",
            "value" => "222"
        ];
        $response = $this->put('/api/edit-expense/56', $object);
        $response->assertStatus(200);
    }
}
