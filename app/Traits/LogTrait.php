<?php 
namespace App\Traits;

use Illuminate\Support\Facades\Log;

trait LogTrait
{
    public function writeLog($message) 
    {
        Log::info($message);
    }
}