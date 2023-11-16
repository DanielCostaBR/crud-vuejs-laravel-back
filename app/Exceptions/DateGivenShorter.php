<?php

namespace App\Exceptions;

use Exception;

class DateGivenShorter extends Exception
{
    public function __construct()
    {
        $httpCode = 401;
        $message = 'A data informada é maior que a data de hoje';
        parent::__construct($message, $httpCode);
    }
}