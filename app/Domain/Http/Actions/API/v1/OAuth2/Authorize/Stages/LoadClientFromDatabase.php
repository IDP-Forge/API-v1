<?php

namespace App\Domain\Http\Actions\API\v1\OAuth2\Authorize\Stages;

use App\Models\Views\ViewApplication;
use App\Domain\Http\Actions\API\v1\OAuth2\Authorize\AuthorizeState;

class LoadClientFromDatabase
{
    public function handle(AuthorizeState $state): AuthorizeState
    {
        $input = $state->input;

        if(empty($input)) return $state;

        $client = ViewApplication::findByUniqueID($input->client_id);

        $state->setClient($client);

        return $state;
    }
}
