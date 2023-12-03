<?php

namespace Tests\Feature\API\v1;

use Tests\TestCase;
use App\Models\Role;
use App\Models\Account;
use App\Models\Organization;
use App\Models\Account2Role;
use App\Models\Account2Organization;

class OrganizationAccountRolesTest extends TestCase
{
    protected int $organization_id;
    protected int $account_id;

    public function setUp(): void
    {
        parent::setUp();

        $organization = Organization::factory()->count(1)->create();

        $roles = Role::factory()->count(10)->create([
            'organization_id' => $organization->first()->id
        ]);

        $accounts = Account::factory()
            ->count(2)
            ->create();

        $accounts->map(function(Account $account) use ($organization, $roles) {
            Account2Organization::factory()->create([
                'account_id' => $account->id,
                'organization_id' => $organization->first()->id
            ]);

            $roles->map(function (Role $role) use ($account) {
                Account2Role::create([
                    'role_id' => $role->id,
                    'account_id' => $account->id
                ]);
            });
        });

        $this->organization_id = $organization->first()->id;
        $this->account_id = $accounts->first()->id;
    }

    public function test_account_role_listing_works(): void
    {
        $response = $this->get('/api/v1/organization/'. $this->organization_id .'/account/'. $this->account_id .'/roles');

        $response->assertStatus(200);
        $response->assertJsonStructure([
            [
                'id',
                'account_id',
                'organization_id',
                'protected',
                'role_title',
                'slug',
                'description'
            ]
        ]);
    }
}
