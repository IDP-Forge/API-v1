<?php

use App\Models\IdentityProvider;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Extensions\Database\ModellableMigration;

return new class extends ModellableMigration
{
    protected string $model = IdentityProvider::class;

    public function up(): void
    {
        Schema::create($this->table, function(Blueprint $table)
        {
            $table->id();
            $table->integer('type_id')->unsigned()->nullable();
            $table->boolean('is_default')->default(0);
            $table->string('title');
            $table->text('description');
            $table->json('config');
            $table->timestamps();

            $table->foreign('type_id')->references('id')->on('protocols')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists($this->table);
    }
};
