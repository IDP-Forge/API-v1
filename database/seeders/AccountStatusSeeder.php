<?php

namespace Database\Seeders;

use App\Models\AccountStatus;
use Illuminate\Database\Seeder;

class AccountStatusSeeder extends Seeder
{
    public function run(): void
    {
        AccountStatus::insert(AccountStatus::T_STATUSES);
    }
}
