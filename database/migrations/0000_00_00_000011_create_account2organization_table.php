<?php

use Illuminate\Support\Facades\DB;
use App\Models\Account2Organization;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Query\Expression;
use App\Extensions\Database\ModellableMigration;

return new class extends ModellableMigration
{
    protected string $model = Account2Organization::class;

    public function up(): void
    {
        Schema::create($this->table, function (Blueprint $table) {
            $table->id();
            $table->bigInteger('account_id')->unsigned();
            $table->bigInteger('organization_id')->unsigned();
            $table->json('attributes')->default(new Expression('(JSON_ARRAY())'));
            $table->timestamps();

            $table->unique(['account_id', 'organization_id']);

            $table->foreign('account_id')->references('id')->on('accounts')->onDelete('cascade');
            $table->foreign('organization_id')->references('id')->on('organizations')->onDelete('cascade');
        });

        // In case of error related to creating the trigger, set the value of MySQL variable
        // log_bin_trust_function_creators to ON
        DB::unprepared($this->provideBeforeInsertTriggerSQL());
        DB::unprepared($this->provideBeforeDeleteTrigger());
    }

    public function down(): void
    {
        Schema::dropIfExists($this->table);
    }

    protected function provideBeforeInsertTriggerSQL(): string
    {
        return <<<EOF
CREATE TRIGGER `{$this->table}_before_insert` BEFORE INSERT
ON `$this->table`
    FOR EACH ROW BEGIN
        UPDATE organizations SET member_count = member_count + 1 WHERE id = NEW.organization_id;
    END
EOF;

    }

    protected function provideBeforeDeleteTrigger(): string
    {
        return <<<EOF
CREATE TRIGGER `{$this->table}_before_delete` BEFORE DELETE
ON `$this->table`
    FOR EACH ROW BEGIN
        UPDATE organizations SET member_count = member_count -1 WHERE id = OLD.organization_id;
    END
EOF;

    }
};
