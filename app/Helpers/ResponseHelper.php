<?php

namespace App\Helpers;

use Illuminate\Http\JsonResponse;

class ResponseHelper
{

    /**
     * Formatted Json Response to FrontEnd
     * @param $data
     * @param int $code
     * @param String $message
     * @param array $errors
     * @param array $header
     * @param bool $success
     * @return JsonResponse
     */
    public static function json($data, int $code, $message = '', $errors = [], $success = true, $header = [])
    {
        $response = ['result' => $data, 'message' => $message, 'errors' => $errors, 'success' => $success, 'status' => $code];
        return response()->json($response, $code, $header);
    }
}
