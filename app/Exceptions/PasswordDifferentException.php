<?php

namespace App\Exceptions;

use Exception;

class PasswordDifferentException extends Exception
{
    public function __construct()
    {
        $httpCode = 401;
        $message = 'As senhas não conferem';
        parent::__construct($message, $httpCode);
    }
}