<?php

namespace Tests\Feature\API\v1;

use Tests\TestCase;
use App\Models\Role;
use App\Models\Organization;
use PHPUnit\Framework\Attributes\DataProvider;

class OrganizationRolesTest extends TestCase
{
    protected Organization $organization;

    public function setUp(): void
    {
        parent::setUp();

        $organization = Organization::factory()->create();

        Role::factory()->count(10)->create([
            'organization_id' => $organization->first()->id
        ]);

        $this->organization = $organization->first();
    }

    public function test_list_organization_roles(): void
    {
        $response = $this->get('/api/v1/organization/'. $this->organization->id .'/roles');

        $response->assertStatus(200);
    }

    #[DataProvider('provideRoleCreateData')]
    public function test_create_organization_role(int $status, array $data, array $keys)
    {
        $response = $this->post('/api/v1/organization/'. $this->organization->id .'/role', $data);

        $response->assertStatus($status);

        if(!empty($keys))
        {
            $response->assertJsonStructure($keys);
        }
    }

    public static function provideRoleCreateData(): array
    {
        return [
            'Invalid data' => [
                422, [], []
            ],

            'Valid data' => [
                201,
                [
                    'title' => fake()->text(100),
                    'slug' => fake()->text(20),
                    'description' => fake()->text(255)
                ],
                [
                    'id',
                    'organization_id',
                    'protected',
                    'title',
                    'slug',
                    'description',
                    'created_at',
                    'updated_at'
                ]
            ]
        ];
    }
}
