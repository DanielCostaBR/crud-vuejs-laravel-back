<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{

    protected $table = 'laravel.users';
    protected $primaryKey = 'id';

    public function getUserByEmail(string $email): array
    {
        $query = self::where('email', $email)
            ->get()
            ->toArray();

        if (empty($query)) {
            return [];
        }
        return $query;
    }

}
