<?php

use Illuminate\Support\Facades\DB;
use App\Models\Views\ViewApplication;
use Illuminate\Support\Facades\Schema;
use App\Extensions\Database\ModellableMigration;

return new class extends ModellableMigration
{
    protected string $model = ViewApplication::class;

    public function up(): void
    {
        DB::unprepared($this->provideCreateViewSQL());
    }

    public function down(): void
    {
        Schema::dropIfExists($this->table);
    }

    protected function provideCreateViewSQL(): string
    {
        return <<<SQL
CREATE ALGORITHM=MERGE VIEW $this->table AS
SELECT
    a.id,
    a2p.unique_id AS unique_id,
    a.protocol_id,
    a.active,
    a.title,
    a.description,
    p.title AS protocol_title,
    a.config,
    a2p.metadata

FROM applications a

INNER JOIN protocols p ON p.id = a.protocol_id

INNER JOIN application2protocol_metadata a2p ON a2p.application_id = a.id AND a2p.protocol_id = p.id

SQL;

    }
};
