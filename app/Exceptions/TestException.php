<?php

namespace App\Exceptions;

class TestException extends CustomException
{
    public static function oopsieDaysy()
    {
        return new self("Oopsie daisy", 403);
    }

    public static function siteIsDown()
    {
        return new self("site is down", 500);
    }
}
