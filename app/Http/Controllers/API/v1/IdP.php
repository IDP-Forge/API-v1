<?php

namespace App\Http\Controllers\API\v1;

use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\API\v1\IdP\{
    Read,
    Create,
    Update,
    Delete,
    Listing,
    Deactivate
};
use App\Domain\Http\Actions\API\v1\IdP\{
    Read\ReadIdP,
    Listing\ListIdP,
    Create\CreateIdP,
    Update\UpdateIdP,
    Delete\DeleteIdP,
    Deactivate\DeactivateIdP
};
use SimpleMehanizm\Http\Protocol\Status\Code;

class IdP extends Controller
{
    public function listing(Listing $request, ListIdP $action): JsonResponse
    {
        return response()->json(
            $action
                ->execute((int)$request->input('page', 0))
                ->getResult()
        );
    }

    public function read(Read $request, int $id, ReadIdP $action): JsonResponse
    {
        return response()->json(
            $action
                ->execute($id)
                ->getResult()
        );
    }

    public function create(Create $request, CreateIdP $action): JsonResponse
    {
        return response()->json(
            $action
                ->execute($request->getDTO())
                ->getResult(),
            Code::HTTP_CREATED->value
        );
    }

    public function update(Update $request, int $id, UpdateIdP $action): JsonResponse
    {
        return response()->json(
            $action
                ->execute($id, $request->getDTO())
                ->getResult()
        );
    }

    public function deactivate(Deactivate $request, int $id, DeactivateIdP $action): JsonResponse
    {
        return response()->json(
            $action->execute()->getResult()
        );
    }

    public function delete(Delete $request, int $id, DeleteIdP $action): JsonResponse
    {
        return response()->json(
            $action->execute()->getResult()
        );
    }
}
