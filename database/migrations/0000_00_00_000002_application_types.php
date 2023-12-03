<?php

use App\Models\ApplicationType;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use App\Extensions\Database\ModellableMigration;

return new class extends ModellableMigration
{
    protected string $model = ApplicationType::class;

    public function up(): void
    {
        Schema::create($this->table, function(Blueprint $table)
        {
            // Primary key is NOT auto-incremented
            $table->integer('id')->primary()->unsigned();
            $table->string('title');
            $table->text('description');
            $table->string('rfc');
            $table->json('metadata');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists($this->table);
    }
};
