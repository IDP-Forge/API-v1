<?php

namespace App\Http\Controllers\API\v1;

use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\API\v1\Menu\Read;
use App\Domain\Http\Actions\Menu\AvailableMenuOptions;

class Menu extends Controller
{
    public function menu(Read $request, AvailableMenuOptions $action): JsonResponse
    {
        return response()->json(
            $action
                ->execute($request->getLocale())
                ->getResult()
        );
    }
}
