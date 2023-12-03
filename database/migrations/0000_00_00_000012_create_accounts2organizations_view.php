<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use App\Models\Views\ViewAccount2Organization;
use App\Extensions\Database\ModellableMigration;

return new class extends ModellableMigration
{
    protected string $model = ViewAccount2Organization::class;

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
        return <<<EOF
CREATE ALGORITHM=MERGE VIEW $this->table AS
SELECT
    a.*,
    a2o.organization_id,
    a2o.account_id,
    a2o.attributes,
    o.active AS org_is_active,
    o.title AS org_title,
    o.description AS org_description,
    o.member_count AS org_member_count,
    a2o.created_at AS associated_at,
    a2o.id AS association_id

FROM accounts a

INNER JOIN accounts2organizations a2o ON a2o.account_id = a.id

INNER JOIN organizations o ON a2o.organization_id = o.id
EOF;

    }
};
