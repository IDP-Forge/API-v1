<?php

namespace App\Domain\Http\Actions\API\v1\Organization\Listing\Stages;

use Closure;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Domain\Http\Actions\API\v1\Organization\Listing\ListingState;

class Paginate
{
    public function handle(ListingState $state, Closure $next)
    {
        $state->setResult(
            $state
                ->getViewOrganization()
                    ->select('*')
                    ->paginate($state->params->limit)
        );

        return $next($state);
    }
}
