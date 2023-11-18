<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class Data extends Model
{
    use Notifiable;

    protected $table = 'laravel.data';
    protected $primaryKey = 'id_data';
    protected $fillable = [
        'id_data',
        'fk_id_user_data',
        'value_data',
        'description_data',
        'createdAt_data'
    ];

    public function getAllDataTable(string $userId)
    {
        $query = DB::table('data')->where('fk_id_user_data', $userId)->get()->toArray();
        return $this->toArrayTreated($query); 
    }

    public function getOneDataTable(string $id): array
    {
        $query = DB::table('data')->where('id_data', $id)->get()->toArray();
        return $this->toArrayTreated($query);
    }

    public function toArrayTreated(array $request): array
    {
        if(empty($request)){
            return ["data" => ""];
        }
        foreach ($request as $key => $value) {
            $date = str_replace("-", "/", $request[$key]->createdAt_data);
            $dateTreated = date('d/m/Y', strtotime($request[$key]->createdAt_data));
            $array = array(
                "userId" => $request[$key]->id_data,
                "IdUserData" => $request[$key]->fk_id_user_data,
                "value" => "R$ ". strval($request[$key]->value_data),
                "description" => $request[$key]->description_data,
                "createdAt" =>  $dateTreated
            );
            $response[] = $array;
        }
        return ["data" => $response];
    }

    public function registerExpense(array $request, string $userId): void
    {
        $date = str_replace("/", "-", $request['createdAt']);
        $dateTreated = date('Y-m-d', strtotime($date));
        $this->insert([
            'value_data' => $request['value'],
            'fk_id_user_data' => $userId,
            'description_data' => $request['description'],
            'createdAt_data' => $dateTreated
        ]);
    }

    public function deleteRegister(string $id): void
    {
        DB::table('data')->where('id_data', $id)->delete();
    }

    public function updateExpense(array $request, string $userId): void
    {
        $date = str_replace("/", "-", $request['createdAt']);
        $dateTreated = date('Y-m-d', strtotime($date));
        DB::table('data')->where('id_data', $userId)->update([
            "value_data" => $request['value'],
            "description_data" => $request['description'],
            "createdAt_data" => $dateTreated
        ]);
    }

    public function scopeRegisters($query)
    {
        return $query->where('id_data', '', '!=');
    }
}
