<?php

namespace App\Domain\Http\Actions\API\v1\Organization\Listing\Stages;

use Closure;
use App\Domain\Http\Actions\API\v1\Organization\Listing\ListingState;

class FilterByActive
{
    public function handle(ListingState $state, Closure $next)
    {
        $params = $state->params;

        if(!is_null($params->active))
        {
            $state->getViewOrganization()->where('active', (int)$params->active);
        }

        return $next($state);
    }
}
