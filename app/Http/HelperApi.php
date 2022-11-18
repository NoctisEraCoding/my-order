<?php

namespace App\Http;

use App\Exceptions\PreconditionFailedApi;
use Illuminate\Support\Facades\Validator;

class HelperApi{
    public static function successResponse($message = 'Success', $data = null): \Illuminate\Http\JsonResponse
    {
        if(is_null($data)){
            $response = [
                "status" => "success",
                "code" => 200,
                "message" => $message
            ];
        }
        else{
            $response = [
                "status" => "success",
                "code" => 200,
                "message" => $message,
                "data" => $data
            ];
        }

        return response()->json($response);
    }

    /**
     * @throws PreconditionFailedApi
     */
    public static function validateParam($params, $rules): bool
    {
        if(isset($params)){
            $validator = Validator::make($params, $rules);

            if(!$validator->passes()){
                throw new PreconditionFailedApi($validator->messages());
            }
        }

        return true;
    }
}
