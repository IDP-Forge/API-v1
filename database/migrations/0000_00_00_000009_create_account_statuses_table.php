<?php

use App\Models\AccountStatus;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use App\Extensions\Database\ModellableMigration;

return new class extends ModellableMigration
{
    protected string $model = AccountStatus::class;

    public function up(): void
    {
        Schema::create($this->table, function (Blueprint $table) {
            $table->integer('id')->unsigned()->primary();
            $table->string('title', 255);
            $table->string('description')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists($this->table);
    }
};
