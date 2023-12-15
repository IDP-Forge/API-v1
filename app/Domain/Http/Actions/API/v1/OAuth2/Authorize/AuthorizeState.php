<?php

namespace App\Domain\Http\Actions\API\v1\OAuth2\Authorize;

use App\Models\Views\ViewApplication;
use App\Domain\OAuth2\ValueObject\RequestParams;
use App\Domain\OAuth2\Protocol\Grant\OAuth2GrantInterface;

class AuthorizeState
{
    protected OAuth2GrantInterface $grant;
    protected ViewApplication $client;

    public function __construct(
        public readonly RequestParams $input
    ){}

    public function setGrant(OAuth2GrantInterface $grant): void
    {
        $this->grant = $grant;
    }

    public function getGrant(): OAuth2GrantInterface
    {
        if(!($this->grant instanceof OAuth2GrantInterface))
        {
            throw new \LogicException('AuthorizeState::getGrant() called before AuthorizeState::setGrant(). Make sure you set the grant before accessing one.');
        }

        return $this->grant;
    }

    public function setClient(ViewApplication $client): void
    {
        $this->client = $client;
    }

    public function getClient(): ViewApplication
    {
        if(!($this->client instanceof ViewApplication))
        {
            throw new \LogicException('AuthorizeState::getClient() called before AuthorizeState::setClient(). Make sure you set the client before accessing one.');
        }

        return $this->client;
    }
}
