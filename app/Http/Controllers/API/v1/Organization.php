<?php

namespace App\Http\Controllers\API\v1;

use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use SimpleMehanizm\Http\Protocol\Status\Code;
use App\Http\Requests\API\v1\Organization\Read;
use App\Http\Requests\API\v1\Organization\Create;
use App\Http\Requests\API\v1\Organization\Update;
use App\Http\Requests\API\v1\Organization\Delete;
use App\Http\Requests\API\v1\Organization\ReadRoles;
use App\Http\Requests\API\v1\Organization\CreateRole;
use App\Http\Requests\API\v1\Organization\CreatePermission;
use App\Domain\Http\Actions\API\v1\Organization\ReadAccounts;
use App\Domain\Http\Actions\API\v1\Organization\RemoveAccount;
use App\Domain\Http\Actions\API\v1\Organization\Listing\Listing;
use App\Domain\Http\Actions\API\v1\Organization\ReadOrganization;
use App\Domain\Http\Actions\API\v1\Organization\CreateOrganization;
use App\Domain\Http\Actions\API\v1\Organization\UpdateOrganization;
use App\Domain\Http\Actions\API\v1\Organization\DeleteOrganization;
use App\Domain\Http\Actions\API\v1\Organization\ReadOrganizationRoles;
use App\Domain\Http\Actions\API\v1\Organization\CreateOrganizationRole;
use App\Domain\Http\Actions\API\v1\Organization\ReadOrganizationChildren;
use App\Domain\Http\Actions\API\v1\Organization\ReadOrganizationPermissions;
use App\Domain\Http\Actions\API\v1\Organization\ReadOrganizationAccountRoles;
use App\Domain\Http\Actions\API\v1\Organization\CreateOrganizationPermission;

class Organization extends Controller
{
    public function listing(Read $request, Listing $action): JsonResponse
    {
        return response()->json(
            $action
                ->execute($request->getListingDTO())
                ->getResult()
        );
    }

    public function read(Read $request, int $id, ReadOrganization $action): JsonResponse
    {
        return response()->json(
            $action
                ->execute($id)
                ->getResult()
        );
    }

    public function create(Create $request, CreateOrganization $action): JsonResponse
    {
        return response()->json(
            $action
                ->execute($request->getDTO())
                ->getResult()
        , Code::HTTP_CREATED->value);
    }

    public function update(Update $request, int $id, UpdateOrganization $action): JsonResponse
    {
        return response()->json(
            $action
                ->execute($id, $request->getDTO())
                ->getResult()
        );
    }

    public function delete(Delete $request, int $id, DeleteOrganization $action): JsonResponse
    {
        return response()->json(
            $action
                ->execute($id)
                ->getResult()
        );
    }

    public function accounts(Read $request, int $id, ReadAccounts $action): JsonResponse
    {
        return response()->json(
            $action
                ->execute($id, $request->getListAccountsDTO())
                ->getResult()
        );
    }

    public function removeAccount(Delete $request, int $organization_id, int $account_id, RemoveAccount $action): JsonResponse
    {
        return response()->json(
            $action
                ->execute($organization_id, $account_id)
                ->getResult()
        );
    }

    public function roles(ReadRoles $request, int $organization_id, ReadOrganizationRoles $action): JsonResponse
    {
        return response()->json(
            $action
                ->execute($organization_id)
                ->getResult()
        );
    }

    public function createRole(CreateRole $request, int $organization_id, CreateOrganizationRole $action): JsonResponse
    {
        return response()->json(
            $action
                ->execute($organization_id, $request->getDTO())
                ->getResult()
        , Code::HTTP_CREATED->value);
    }

    public function accountRoles(Read $request, int $organization_id, int $account_id, ReadOrganizationAccountRoles $action): JsonResponse
    {
        return response()->json(
            $action
                ->execute($organization_id, $account_id)
                ->getResult()
        );
    }

    public function permissions(Read $request, int $organization_id, ReadOrganizationPermissions $action): JsonResponse
    {
        return response()->json(
            $action
                ->execute($organization_id, $request->getListOrganizationPermissionsDTO())
                ->getResult()
        );
    }

    public function createPermission(CreatePermission $request, int $organization_id, CreateOrganizationPermission $action): JsonResponse
    {
        return response()->json(
            $action
                ->execute($organization_id, $request->getDTO())
                ->getResult()
        , Code::HTTP_CREATED->value);
    }

    public function children(Read $request, int $organization_id, ReadOrganizationChildren $action): JsonResponse
    {
        return response()->json(
            $action
                ->execute($organization_id)
                ->getResult()
        );
    }
}
