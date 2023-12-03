<?php

namespace Database\Seeders;

use App\Models\ApplicationType;
use Illuminate\Database\Seeder;

class ApplicationTypeSeeder extends Seeder
{
    public function run(): void
    {
        ApplicationType::insert(array_map(function(array $item) {
            $item['metadata'] = json_encode($item['metadata']);

            return $item;
        }, ApplicationType::APP_TYPES));
    }
}
