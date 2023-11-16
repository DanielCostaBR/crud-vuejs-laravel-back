<?php

namespace App\Exceptions;

use Exception;

class ExistEmailException extends Exception
{
    public function __construct()
    {
        $httpCode = 401;
        $message = 'E-mail informado já está em uso';
        parent::__construct($message, $httpCode);
    }
}