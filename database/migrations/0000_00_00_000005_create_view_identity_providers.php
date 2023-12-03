<?php

use Illuminate\Support\Facades\DB;
use App\Extensions\Database\ModellableMigration;
use App\Models\Views\ViewIdentityProvider;

return new class extends ModellableMigration
{
    protected string $model = ViewIdentityProvider::class;

    public function up(): void
    {
        DB::unprepared($this->provideCreateViewStatement());
    }

    public function down(): void
    {
        DB::statement('DROP VIEW IF EXISTS '. $this->table);
    }

    protected function provideCreateViewStatement(): string
    {
        return <<<SQL

        CREATE ALGORITHM=MERGE VIEW {$this->table} AS
        SELECT
            i.id,
            i.type_id,
            p.title AS protocol_title,
            i.is_default,
            i.title,
            i.description,
            i.config,
            i.created_at,
            i.updated_at
        FROM identity_providers i

        INNER JOIN protocols p ON p.id = i.type_id
SQL;

    }
};
