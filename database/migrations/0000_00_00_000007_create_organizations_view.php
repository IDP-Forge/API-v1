<?php

use Illuminate\Support\Facades\DB;
use App\Models\Views\ViewOrganization;
use App\Extensions\Database\ModellableMigration;

return new class extends ModellableMigration
{
    protected string $model = ViewOrganization::class;

    public function up(): void
    {
        DB::unprepared($this->provideCreateViewSQL());
    }

    public function down(): void
    {
        DB::unprepared('DROP VIEW IF EXISTS '. $this->table);
    }

    protected function provideCreateViewSQL(): string
    {
        return <<<SQL
CREATE VIEW $this->table AS

WITH RECURSIVE organization_hierarchy AS (

    SELECT
        id,
        parent_id,
        title,
        CAST(NULL AS CHAR(255)) AS parent_title,
        0 AS depth

    FROM organizations

    WHERE parent_id IS NULL

    UNION ALL

    SELECT
        c.id,
        c.parent_id,
        c.title,
        org.title AS parent_title,
        org.depth + 1

    FROM organization_hierarchy org

    INNER JOIN organizations c ON org.id = c.parent_id

)  SELECT * FROM organization_hierarchy

SQL;

    }
};
