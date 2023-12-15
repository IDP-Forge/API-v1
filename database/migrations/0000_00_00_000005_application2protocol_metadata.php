<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Query\Expression;
use Illuminate\Database\Schema\Blueprint;
use App\Models\Application2ProtocolMetadata;
use App\Extensions\Database\ModellableMigration;

return new class extends ModellableMigration
{
    protected string $model = Application2ProtocolMetadata::class;

    public function up(): void
    {
        Schema::create($this->table, function(Blueprint $table)
        {
            $table->id();
            $table->bigInteger('application_id')->unsigned();
            $table->bigInteger('protocol_id')->unsigned();
            $table->json('metadata')->default(new Expression('(JSON_ARRAY())'));
        });

        DB::unprepared("ALTER TABLE $this->table ADD unique_id BINARY(64) AFTER id");
        DB::unprepared("ALTER TABLE $this->table ADD UNIQUE(unique_id)");
    }

    public function down(): void
    {
        Schema::dropIfExists($this->table);
    }
};
