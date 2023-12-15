<?php

namespace App\Domain\Http\Actions\API\v1\OAuth2\Authorize;

use SimpleMehanizm\Pipeline\Pipeline;
use App\Domain\OAuth2\ValueObject\RequestParams;
use App\Domain\Http\Actions\API\v1\OAuth2\Authorize\Stages\DetermineGrant;

class AuthorizeAction
{
    public function execute(RequestParams $input): self
    {
        $pipeline = new Pipeline();
        $state = new AuthorizeState($input);

        $stages = [
            DetermineGrant::class,
        ];

        return $this;
    }
}
