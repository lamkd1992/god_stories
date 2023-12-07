<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    // /**
    //  * Template response of api success
    //  *
    //  * @param  object  $message
    //  * @param  array|object|null  $data
    //  * @return \Illuminate\Http\JsonResponse
    //  */
    // public function apiSuccess($message, $data = null)
    // {
    //     return response()->json([
    //         'code' => 200,
    //         'status' => true,
    //         'message' => $message ?? 'Success',
    //         'data' => $data,
    //     ]);
    // }

    // /**
    //  * Template response of api error
    //  *
    //  * @param  object  $message
    //  * @param  int     $status
    //  * @return \Illuminate\Http\JsonResponse
    //  */
    // public function apiError($message, $status)
    // {
    //     return response()->json([
    //         'code' => 1001,
    //         'status' => false,
    //         'message' => $message,

    //     ], $status);
    // }
}
