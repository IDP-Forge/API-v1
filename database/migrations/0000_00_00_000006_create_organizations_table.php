<?php

use App\Models\Organization;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use App\Extensions\Database\ModellableMigration;

return new class extends ModellableMigration
{
    protected string $model = Organization::class;

    public function up(): void
    {
        Schema::create($this->table, function (Blueprint $table) {
            $table->id();
            $table->bigInteger('parent_id')->unsigned()->nullable();
            $table->boolean('active');
            $table->boolean('protected')->default('0');
            $table->string('title');
            $table->string('description')->nullable();
            $table->json('metadata')->nullable();
            $table->bigInteger('member_count')->unsigned()->default('0');
            $table->foreign('parent_id')->references('id')->on($this->table)->onDelete('set null');

            $table->timestamps();
        });

        \DB::unprepared("ALTER TABLE organizations ADD unique_id BINARY(64) DEFAULT NULL AFTER id");
        \DB::unprepared("ALTER TABLE organizations ADD client_id CHAR(32) DEFAULT NULL AFTER unique_id");
        \DB::unprepared("ALTER TABLE organizations ADD UNIQUE(unique_id)");
    }

    public function down(): void
    {
        Schema::dropIfExists($this->table);
    }
};
