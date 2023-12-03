<?php

namespace Tests\Feature\API\v1;

use Tests\TestCase;
use App\Models\Account;
use App\Models\Organization;
use App\Models\Account2Organization;

class OrganizationAccountsTest extends TestCase
{
    protected Organization $organization;

    public function setUp(): void
    {
        parent::setUp();

        $organization = Organization::factory()->count(1)->create();

        $accounts = Account::factory()
            ->count(11)
            ->create();

        $accounts->map(function(Account $account) use ($organization) {
            Account2Organization::factory()->create([
                'account_id' => $account->id,
                'organization_id' => $organization->first()->id
            ]);
        });

        $this->organization = $organization->first();
    }

    public function test_list_accounts_in_organization(): void
    {
        $response = $this->json('GET', '/api/v1/organization/'. $this->organization->id .'/accounts', [
            'limit' => 5
        ]);

        $response->assertStatus(200);
        $response->assertJsonCount(5, 'data');
        $response->assertJsonStructure([
            'current_page',
            'data',
            'first_page_url',
            'from',
            'last_page',
            'last_page_url',
            'links',
            'next_page_url',
            'path',
            'per_page',
            'prev_page_url',
            'to',
            'total'
        ]);
    }
}
