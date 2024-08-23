<?php 
namespace App\Traits;

use Illuminate\Support\Facades\Log;

trait LogTrait
{
    public function writeLog(string $message) 
    {
        Log::info($message);
    }
}