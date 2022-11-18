<?php

namespace App\Exceptions;

use Exception;

class PreconditionFailedApi extends Exception
{
    public function __construct(string $message = '{"generic error": "Missing parameters or failed validation}', int $code = 422, ?Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    public function render($request){
        return response()->json([
            "status" => 'fail',
            "code" => 422,
            "message" => [
                "validation error" => json_decode($this->getMessage(), true)
            ]
        ], 422);
    }
}
