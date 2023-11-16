<?php

namespace App\Services;

use App\Exceptions\DateGivenShorter;

class ValidateDateService
{
    public function validateDate(string $requestDate): void
    {
        $date = str_replace("/", "-", $requestDate);
        $requestDateFormated = date("Y-m-d", strtotime($date));
        $requestDateTreated = strtotime($requestDateFormated);
        $currentDate = date('Y-m-d');
        $currentDateTreated = strtotime($currentDate);
        if($requestDateTreated > $currentDateTreated){
           throw new DateGivenShorter();
        }
    }
}
