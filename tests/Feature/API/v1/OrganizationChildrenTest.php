<?php

namespace Tests\Feature\API\v1;

use Tests\TestCase;
use App\Models\Organization;

class OrganizationChildrenTest extends TestCase
{
    protected Organization $parent;

    public function setUp(): void
    {
        parent::setUp();

        $this->parent = Organization::factory()->count(1)->create()->first();

        Organization::factory()->count(15)->create([
            'parent_id' => $this->parent->id
        ]);
    }

    public function test_listing_child_organizations_works(): void
    {
        $response = $this->json('GET', '/api/v1/organization/'. $this->parent->id .'/children');

        $response->assertStatus(200);
        $response->assertJsonStructure([
            [
                'id',
                'unique_id',
                'client_id',
                'parent_id',
                'active',
                'protected',
                'title',
                'description',
                'metadata',
                'member_count'
            ]
        ]);
    }
}
