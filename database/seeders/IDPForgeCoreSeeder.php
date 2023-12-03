<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class IDPForgeCoreSeeder extends Seeder
{
    public function run(): void
    {
        $this->call(ProtocolSeeder::class);
        $this->call(ApplicationTypeSeeder::class);
        $this->call(AccountStatusSeeder::class);
    }
}
