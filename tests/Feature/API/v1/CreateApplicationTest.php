<?php

namespace Tests\Feature\API\v1;

use Tests\TestCase;
use App\Models\Protocol;
use PHPUnit\Framework\Attributes\DataProvider;

class CreateApplicationTest extends TestCase
{
    #[DataProvider('provideCreateAppData')]
    public function test_create_application(int $status, array $data, array $keys): void
    {
        $response = $this->post('/api/v1/application', $data);

        $response->assertStatus($status);

        if(!empty($keys))
        {
            $response->assertJsonStructure($keys);
        }
    }

    public static function provideCreateAppData(): array
    {
        return [
            'fails validation' => [
                422, [], []
            ],

            'creates app' => [
                201,
                [
                    'protocol_id' => Protocol::PROTOCOL_OAUTH2_ID,
                    'active' => true,
                    'title' => fake()->text(100),
                    'description' => fake()->text(200),
                    'config' => [
                        'key' => [
                            'value' => 2
                        ]
                    ]
                ],
                [
                    'id',
                    'protocol_id',
                    'active',
                    'title',
                    'description',
                    'config'
                ]
            ]
        ];
    }
}
