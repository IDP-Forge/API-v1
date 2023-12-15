<?php

namespace App\Http\Controllers\API\v1;

use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use SimpleMehanizm\Http\Protocol\Status\Code;
use App\Http\Requests\API\v1\Applications\Create;
use App\Http\Requests\API\v1\Applications\ReadTypes;
use App\Domain\Http\Actions\API\v1\Applications\ReadAppTypes;
use App\Domain\Http\Actions\API\v1\Applications\CreateApplication;

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

    public function create(Create $request, CreateApplication $action): JsonResponse
    {
        return response()->json(
            $action
                ->execute($request->getDTO())
                ->getResult()
        , Code::HTTP_CREATED->value);
    }
}
