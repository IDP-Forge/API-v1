<?php

namespace Tests\Feature\API\v1;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UITest extends TestCase
{
    public function test_get_idp_listing_table_headers_works(): void
    {
        $response = $this->get('/api/v1/ui/idp/listing/table/headers');

        $response->assertStatus(200);

        $response->assertJsonStructure([
            [
                'key',
                'sortable',
                'title',
            ]
        ]);
    }
}
