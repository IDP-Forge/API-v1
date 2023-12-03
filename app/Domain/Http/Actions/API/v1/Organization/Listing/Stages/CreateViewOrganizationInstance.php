<?php

namespace App\Domain\Http\Actions\API\v1\Organization\Listing\Stages;

use Closure;
use App\Models\Views\ViewOrganization;
use App\Domain\Http\Actions\API\v1\Organization\Listing\ListingState;

class CreateViewOrganizationInstance
{
    public function handle(ListingState $state, Closure $next)
    {
        $state->setViewOrganization(new ViewOrganization());

        return $next($state);
    }
}
