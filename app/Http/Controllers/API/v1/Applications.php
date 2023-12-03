<?php

namespace App\Http\Controllers\API\v1;

use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\API\v1\Applications\ReadTypes;
use App\Domain\Http\Actions\API\v1\Applications\ReadAppTypes;

class Applications extends Controller
{
    public function getAppTypes(ReadTypes $request, ReadAppTypes $action): JsonResponse
    {
        return response()->json(
            $action
                ->execute()
                ->getResult()
        );
    }
}
