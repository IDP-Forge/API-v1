<?php

use App\Models\PasswordPolicy;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use App\Extensions\Database\ModellableMigration;

return new class extends ModellableMigration
{
    protected string $model = PasswordPolicy::class;

    public function up(): void
    {
        Schema::create($this->table, function (Blueprint $table) {
            $table->id();
            $table->boolean('protected')->unsigned()->nullable();
            $table->string('title', 255);
            $table->string('description')->nullable();
            $table->integer('num_users')->unsigned()->default('0');

            // Password history. NULL means no password history.
            // An integer value means how many passwords must be recycled before old one can be used
            $table->integer('history')->nullable();

            // Minimum password length. NULL means no limit
            $table->integer('min_length')->nullable()->default('8');

            // Minimum password strength, according to ZXCVBN strength-meter
            $table->integer('min_strength')->nullable()->default('1');

            // How many BAD auth. attempts are required before account is locked out. NULL for unlimited
            $table->integer('lockout')->nullable()->default('3');

            // How many seconds to be locked for until authentication is allowed again
            $table->integer('lockout_duration')->unsigned()->nullable()->default('0');

            // How many days the password is valid for, before user is required to change it.
            // NULL to turn it off.
            $table->integer('max_age')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('$this->table');
    }
};
