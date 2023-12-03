<?php

namespace App\Http\Controllers\API\v1;

use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\API\v1\Protocols\Read;
use App\Domain\Http\Actions\API\v1\Protocols\Listing;

class Protocols extends Controller
{
    public function listing(Read $request, Listing $action): JsonResponse
    {
        return response()->json(
            $action->execute()->getResult()
        );
    }
}
