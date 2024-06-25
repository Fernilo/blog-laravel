<?php

namespace App\Exceptions;

use Exception;

class CustomException extends Exception
{
    public static function internalException()
    {
        return new static("An internal exception occurred", 500);
    }
}
