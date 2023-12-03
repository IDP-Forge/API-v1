<?php

namespace App\Domain\Http\Actions\API\v1\Organization\Listing\Stages;

use Closure;
use App\Domain\Http\Actions\API\v1\Organization\Listing\ListingState;

class OrderBy
{
    public function handle(ListingState $state, Closure $next)
    {
        $params = $state->params;

        if(!empty($params->sortBy))
        {
            $orderable = $state->getViewOrganization()->getOrderableFields();

            if(in_array($params->sortBy, $orderable))
            {
                $state->getViewOrganization()->orderBy($params->sortBy, $params->sortWay);
            }
        }

        return $next($state);
    }
}
