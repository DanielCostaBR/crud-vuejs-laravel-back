<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\Data as ModelsData;

class DataTest extends TestCase
{

    public function test_check_if_user_colunms_is_correct(): void
    {
        $user = new ModelsData();

        $expected = [
            'id_data',
            'fk_id_user_data',
            'value_data',
            'description_data',
            'createdAt_data'
        ];
        $this->assertSame($expected, $user->getFillable());
    }
}
