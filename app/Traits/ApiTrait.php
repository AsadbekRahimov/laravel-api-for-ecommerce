<?php


namespace App\Traits;

use Exception;

trait ApiTrait
{
    protected function tokenResponse($token, $user)
    {
        return response()->json([
            'statusCode' => 200,
            'message' => 'Sign in',
            'user' => $user,
            'token' => $token
        ], 200);
    }

    protected function apiResponse($message, $status = 200, $result = [])
    {
        $output = [
            'statusCode' => $status,
            'message' => $message
        ];
        if ($result)
        {
            $output += ['data' => $result];
        }

        return response()->json($output, $status);
    }

    protected function throwWhenModelEmpty($model)
    {
        if (is_null($model) || is_null($model->id)) {
            throw new Exception('DATA_SOURCE_NOT_FOUND');
        } elseif ($model->count() == 0) {
            throw new Exception('DATA_SOURCE_NOT_FOUND');
        }
    }

}