<?php

/**
 * Template response of api success
 *
 * @param  string|null  $message
 * @param  array|object|null  $data
 * @return \Illuminate\Http\JsonResponse
 */
if (! function_exists('apiSuccess')) {
    function apiSuccess($data = null, $message = 'Success')
    {
        return response()->json([
            'status' => true,
            'message' => $message,
            'data' => $data,
        ]);
    }
}

/**
 * Template response of api error
 *
 * @param  string  $message
 * @param  int  $status
 * @param  array  $errors
 * @return \Illuminate\Http\JsonResponse
 */
if (! function_exists('apiError')) {
    function apiError($message, $code, $errors = [])
    {
        return response()->json([
            'status' => false,
            'message' => $message,
            'validates' => $errors,
        ], $code);
    }
}
