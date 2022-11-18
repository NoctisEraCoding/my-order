<?php

namespace App\Exceptions;

use Exception;

class ResourcesNotFoundApi extends Exception
{
    public function __construct(string $message = "Resource not found", int $code = 404, ?Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    public function render($request){
        return response()->json([
            "status" => 'fail',
            "code" => 404,
            "message" => $this->getMessage()
        ], 404);
    }
}
