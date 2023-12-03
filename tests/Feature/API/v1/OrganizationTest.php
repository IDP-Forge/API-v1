<?php

namespace Tests\Feature\API\v1;

use Tests\TestCase;
use App\Models\Account;
use App\Models\Organization;
use App\Models\Account2Organization;
use PHPUnit\Framework\Attributes\DataProvider;

class OrganizationTest extends TestCase
{
    protected static int $organization_id = 0;
    protected static bool $booted = false;

    public function setUp(): void
    {
        parent::setUp();

        if(!static::$booted)
        {
            Organization::factory()->count(5)->create();

            static::$organization_id = Organization::firstOrFail()->id;

            static::$booted = true;
        }
    }

    public function test_list_organizations(): void
    {
        $response = $this->get('/api/v1/organizations');

        $response->assertStatus(200);
        $response->assertJsonStructure(['data', 'per_page']);
    }

    public function test_read_organization(): void
    {
        $response = $this->get('/api/v1/organization/'. static::$organization_id);

        $response->assertStatus(200);
    }

    #[DataProvider('provideCreateOrganizationData')]
    public function test_create_organization(int $status, array $data, array $keys): void
    {
        $response = $this->post('/api/v1/organization', $data);

        $response->assertStatus($status);

        if(!empty($keys))
        {
            $response->assertJsonStructure($keys);

            static::$organization_id = $response->json('id');
        }
    }

    #[DataProvider('provideUpdateOrganizationData')]
    public function test_update_organization(int $status, array $data, array $keys): void
    {
        $response = $this->put('/api/v1/organization/'. static::$organization_id, $data);

        $response->assertStatus($status);

        if(!empty($keys))
        {
            $response->assertJsonStructure($keys);
        }
    }

    #[DataProvider('provideDeleteOrganizationData')]
    public function test_delete_organization(int $status, array $keys): void
    {
        $response = $this->delete('/api/v1/organization/'. static::$organization_id);

        $response->assertStatus($status);

        if(!empty($keys))
        {
            $response->assertJsonStructure($keys);
        }
    }

    public static function provideCreateOrganizationData(): array
    {
        return [
            'Invalid data, fails at validation' => [
                422, [], []
            ],

            'Valid data, creates the organization' => [
                201,
                [
                    'title' => fake()->text(200),
                ],

                [
                    'id',
                    'title',
                    'description'
                ]
            ]
        ];
    }

    public static function provideUpdateOrganizationData(): array
    {
        return [
            'Invalid data, fails at validation' => [
                422,
                [],
                []
            ],

            'Valid data, updates organization and metadata' => [
                200,
                [
                    'title' => fake()->text(100),
                    'metadata' =>
                    [
                        'key' => 'value'
                    ]
                ],
                [
                    'id',
                    'active',
                    'parent_id',
                    'description',
                    'metadata'
                ]
            ]
        ];
    }

    public static function provideDeleteOrganizationData(): array
    {
        return [
            'Existing organization' => [
                200,
                [
                    'id',
                    'title',
                    'description',
                    'metadata'
                ]
            ]
        ];
    }
}
