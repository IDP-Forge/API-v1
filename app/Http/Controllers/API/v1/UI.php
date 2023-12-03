<?php

namespace App\Http\Controllers\API\v1;

use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\API\v1\UI\Read;
use App\Domain\Http\Actions\API\v1\UI\IdP\GetListingTableHeaders;

class UI extends Controller
{
    public function getIdPTableHeaders(Read $request, GetListingTableHeaders $action): JsonResponse
    {
        return response()->json(
            $action
                ->execute()
                ->getResponse()
        );
    }
}
