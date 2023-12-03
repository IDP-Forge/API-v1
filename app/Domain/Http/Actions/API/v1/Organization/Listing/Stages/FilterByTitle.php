<?php

namespace App\Domain\Http\Actions\API\v1\Organization\Listing\Stages;

use Closure;
use App\Domain\Http\Actions\API\v1\Organization\Listing\ListingState;

class FilterByTitle
{
    public function handle(ListingState $state, Closure $next)
    {
        $params = $state->params;

        if(!empty($params->title))
        {
            $title = str_replace('%', '', $params->title);

            if(is_string($title) && strlen($title))
            {
                $state->getViewOrganization()->where('title', 'LIKE', $title .'%');
            }
        }

        return $next($state);
    }
}
