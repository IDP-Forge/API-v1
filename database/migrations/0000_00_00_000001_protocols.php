<?php

use App\Models\Protocol;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use App\Domain\IDPForge\ProtocolTypeEnum;
use App\Extensions\Database\ModellableMigration;

return new class extends ModellableMigration
{
    protected string $model = Protocol::class;

    public function up(): void
    {
        Schema::create($this->table, function(Blueprint $table)
        {
            // Primary key is NOT auto-incremented
            $table->integer('id')->primary()->unsigned();
            $table->enum('type', [ProtocolTypeEnum::AuthN->value, ProtocolTypeEnum::AuthZ->value]);
            $table->string('title');
            $table->text('description');
            $table->json('metadata');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists($this->table);
    }
};
