<?php

namespace App\Exceptions;

use Exception;

class UnauthorizedApi extends Exception
{
    public function render(){
        return response()->json([
            "status" => 'fail',
            "code" => 401,
            "message" => "Unauthorized"
        ], 401);
    }
}
