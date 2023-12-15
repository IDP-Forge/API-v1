<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use App\Models\Views\ViewAccountRoles;
use App\Extensions\Database\ModellableMigration;

return new class extends ModellableMigration
{
    protected string $model = ViewAccountRoles::class;

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
    r.id,
    a2r.account_id,
    r.organization_id,
    r.protected,
    r.title AS role_title,
    r.slug,
    r.description

FROM roles r

INNER JOIN accounts2roles a2r ON a2r.role_id = r.id
SQL;

    }
};
