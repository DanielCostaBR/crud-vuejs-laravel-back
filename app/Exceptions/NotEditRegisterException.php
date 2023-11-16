<?php

namespace App\Exceptions;

use Exception;

class NotEditRegisterException extends Exception
{
    public function __construct()
    {
        $httpCode = 401;
        $message = 'Voce não tem permissão para editar este registro!';
        parent::__construct($message, $httpCode);
    }
}