<?php

namespace App\Domain\Http\Actions\API\v1\OAuth2\Authorize\Stages;

use App\Domain\OAuth2\Protocol\Grant\OAuth2GrantCollection;
use App\Domain\Http\Actions\API\v1\OAuth2\Authorize\AuthorizeState;

class DetermineGrant
{
    public function handle(AuthorizeState $state): AuthorizeState
    {
        $grants = new OAuth2GrantCollection();

        $grant = $grants->getGrant($state->input);

        $state->setGrant($grant);

        return $state;
    }
}
