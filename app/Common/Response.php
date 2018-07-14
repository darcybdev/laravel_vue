<?php

namespace App\Common;

use Illuminate\Http\JsonResponse;

class Response
{
    public static function invalid($errors)
    {
        $data = [
            'status' => 422,
            'errors' => []
        ];
        foreach ($errors as $key => $error) {
            $data['errors'][] = [
                'key' => $key,
                'error' => $error
            ];
        }
        $response = new JsonResponse;
        $response->setStatusCode($data['status']);
        $response->setData($data);
        return $response;
    }

    public static function ok()
    {
        return [
            'status' => 'ok'
        ];
    }
}
