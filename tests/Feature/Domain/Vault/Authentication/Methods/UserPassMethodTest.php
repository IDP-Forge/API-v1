<?php

namespace Tests\Feature\Domain\Vault\Authentication\Methods;

use Tests\TestCase;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\PendingRequest;
use App\Domain\Vault\Authentication\Methods\UsernamePassword;

class UserPassMethodTest extends TestCase
{
    public function test_user_path_method_succeeds(): void
    {
        Http::fake([
            'vault.tld/*' => Http::response([
                'request_id' => '123-456-789',
                'lease_id' => null,
                'renewable' => '',
                'data' => '',
                'auth' => [
                    'client_token' => Str::random(64),
                    'accessor' => 'xghAHTxXxtmn1Svs0so40OpC',
                    'lease_duration' => 604800
                ]

            ], 200)
        ]);

        $method = new UsernamePassword('username', 'password', 'http://vault.tld/');

        $method->authenticate();

        $client = $method->getAuthenticatedClient();

        $this->assertInstanceOf(PendingRequest::class, $client);
    }
}
