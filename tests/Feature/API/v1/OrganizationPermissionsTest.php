<?php

namespace Tests\Feature\API\v1;

use Tests\TestCase;
use App\Models\Permission;
use App\Models\Organization;
use PHPUnit\Framework\Attributes\DataProvider;

class OrganizationPermissionsTest extends TestCase
{
    protected int $organization_id;

    public function setUp(): void
    {
        parent::setUp();

        $this->organization_id = Organization::factory()->count(1)->create()->first()->id;

        Permission::factory()->count(15)->create([
            'organization_id' => $this->organization_id
        ]);
    }

    #[DataProvider('provideCreatePermissionData')]
    public function test_create_permission_works(int $status, array $data, array $keys): void
    {
        $response = $this->post('/api/v1/organization/'. $this->organization_id .'/permission', $data);

        $response->assertStatus($status);

        if(!empty($keys))
        {
            $response->assertJsonStructure($keys);
        }
    }

    public function test_list_permissions_in_organization(): void
    {
        $response = $this->json('GET', '/api/v1/organization/'. $this->organization_id .'/permissions', [

        ]);

        $response->assertStatus(200);
    }

    public static function provideCreatePermissionData(): array
    {
        return [
            'Invalid data provided' => [
                422,
                [],
                []
            ],

            'Valid data provided' => [
                201,
                [
                    'protected' => false,
                    'title' => fake()->text(100),
                    'slug' => fake()->text(10),
                    'description' => fake()->text(255)
                ],
                [
                    'id',
                    'organization_id',
                    'protected',
                    'title',
                    'slug',
                    'description'
                ]
            ]
        ];
    }

    public static function provideListPermissionsData(): array
    {
        return [
            ''
        ];
    }
}
