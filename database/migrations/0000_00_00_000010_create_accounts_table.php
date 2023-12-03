<?php

use App\Models\Account;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Query\Expression;
use App\Extensions\Database\ModellableMigration;

return new class extends ModellableMigration
{
    protected string $model = Account::class;

    public function up(): void
    {
        Schema::create($this->table, function (Blueprint $table) {
            $table->id();
            $table->integer('status_id')->unsigned(); // Account status
            $table->bigInteger('policy_id')->unsigned()->nullable(); // Password policy
            $table->boolean('protected')->default('0');
            $table->boolean('internal')->default('0');

            $table->string('username_readable', 255);
            $table->string('first_name', 255);
            $table->string('last_name', 255);
            $table->string('email', 255);

            // Additional attributes
            $table->json('additional')->default(new Expression('(JSON_ARRAY())'));

            // Used for password history. History column stores old user passwords. @todo: remove password history
            $table->json('history')->default(new Expression('(JSON_ARRAY())'));

            // Stores authentication attempts (array of datetimes). If password policy is in effect, this column
            // is used to determine when and how to lock the account out after X unsuccessful logins
            $table->json('attempts')->default(new Expression('(JSON_ARRAY())'));

            // Messages about account status change etc.
            $table->json('messages')->default(new Expression('(JSON_ARRAY())'));

            // Timestamps
            $table->timestamps();

            // If null, account never expires
            $table->timestamp('expires_at')->nullable();

            // When the last succesful login was made
            $table->timestamp('last_login_at')->nullable();

            // Last password change
            $table->timestamp('password_changed_at')->nullable();

            // When the account was locked at. Used for automatic account un-lock
            $table->timestamp('locked_at')->nullable();

            // When the account was unlocked
            $table->timestamp('unlocked_at')->nullable();

            $table->foreign('status_id')->references('id')->on('account_statuses')->onDelete('cascade');
            $table->foreign('policy_id')->references('id')->on('password_policies')->onDelete('set null');
        });

        DB::unprepared("ALTER TABLE accounts ADD username BINARY(64) AFTER policy_id");
        DB::unprepared("ALTER TABLE accounts ADD UNIQUE(username)");
        DB::unprepared("ALTER TABLE accounts ADD password BINARY(100) DEFAULT NULL AFTER username");
        DB::unprepared("ALTER TABLE accounts ADD unique_id BINARY(36) DEFAULT NULL AFTER id");
        DB::unprepared("ALTER TABLE accounts ADD UNIQUE(unique_id)");
    }

    public function down(): void
    {
        Schema::dropIfExists($this->table);
    }

    protected function provideBeforeInsertTrigger(): string
    {
        return <<<EOF
CREATE TRIGGER {$this->table}_before_insert ON $this->table
    FOR EACH ROW BEGIN
        SET NEW.unique_id = UUID();
    END
EOF;

    }
};
