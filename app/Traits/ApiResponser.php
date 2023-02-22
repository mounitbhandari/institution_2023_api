<?php

namespace App\Traits;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use Illuminate\Pagination\LengthAwarePaginator;

trait ApiResponser{

    protected function successResponse($data, $message = null, $code = 200)
    {
        return response()->json([
            'status'=> true,
            'message' => $message,
            'data' => $data
        ], $code,[],JSON_NUMERIC_CHECK);
    }

    protected function errorResponse($message = null, $code=404)
    {
        return response()->json([
            'status'=>false,
            'message' => $message,
            'data' => null
        ], $code);
    }

}
