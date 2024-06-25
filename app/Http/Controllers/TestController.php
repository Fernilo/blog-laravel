<?php

namespace App\Http\Controllers;

use App\Exceptions\TestException;
use Exception;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function __invoke()
    {
        //try{
            $this->makeSomethingRisky();
        // } catch (TestException $e){
        //     return response()->json([
        //         'message' => $e->getMessage()
        //     ], $e->getCode());
        // }

    }

    protected function makeSomethingRisky()
    {
        throw TestException::siteIsDown();
    }
}
