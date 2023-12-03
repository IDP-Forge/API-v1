<?php

namespace Tests\Feature\Domain\Http\API\v1;

use Tests\TestCase;
use App\Models\Protocol;
use PHPUnit\Framework\Attributes\DataProvider;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class IdpTest extends TestCase
{
    use DatabaseTransactions;

    #[DataProvider('provideIdPCreateData')]
    public function test_create_idp(int $status, array $data): void
    {
        $response = $this->post('/api/v1/idp', $data);

        $response->assertStatus($status);
    }

    public function test_idp_listing(): void
    {
        $response = $this->get('/api/v1/idp/listing');

        $response->assertStatus(200);
    }

    public static function provideIdPCreateData(): array
    {
        return [
            'Valid data for saml 2.0, creates record' => [
                201, [
                    'type_id' => Protocol::PROTOCOL_SAML2_ID,
                    'title' => 'SAML 2.0 IdP',
                    'description' => fake()->text(255)
                ]
            ],

            'Valid data for openid Connect, creates record' => [
                201, [
                    'type_id' => Protocol::PROTOCOL_OIDC_ID,
                    'title' => 'SAML 2.0 IdP',
                    'description' => fake()->text(255)
                ]
            ],

            'Invalid data, misses values' => [
                422, []
            ]
        ];
    }
}
