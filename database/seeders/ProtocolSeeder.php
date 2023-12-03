<?php

namespace Database\Seeders;

use App\Models\Protocol;
use Illuminate\Database\Seeder;

class ProtocolSeeder extends Seeder
{
    public function run(): void
    {
        Protocol::insert(array_map(function(array $item) {
            $item['metadata'] = json_encode($item['metadata']);

            return $item;
        }, Protocol::PROTOCOLS));
    }
}
