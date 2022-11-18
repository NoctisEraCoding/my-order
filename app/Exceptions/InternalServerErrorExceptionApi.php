<?php

namespace App\Exceptions;

use Exception;

class InternalServerErrorExceptionApi extends Exception
{
    public function __construct(string $message = "Interal Server Error", int $code = 500, ?Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    public function render($request): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            "status" => 'fail',
            "code" => 500,
            "message" => $this->getMessage()
        ], 500);
    }
}
