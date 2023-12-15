<?php

namespace App\Http\Controllers\API\v1;

use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\API\v1\OAuth2\Authorize;

class OAuth2 extends Controller
{
    public function processAuthorizationRequest(Authorize $request): JsonResponse
    {
    }
}
