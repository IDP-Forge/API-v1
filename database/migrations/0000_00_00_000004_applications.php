<?php

use App\Models\Protocol;
use App\Models\Application;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Extensions\Database\ModellableMigration;
use function App\Helpers\tableOf;

return new class extends ModellableMigration
{
    protected string $model = Application::class;

    public function up(): void
    {
        Schema::create($this->table, function(Blueprint $table)
        {
            $table->id();
            $table->integer('protocol_id')->unsigned();
            $table->boolean('active')->default(1);
            $table->string('title');
            $table->text('description');
            $table->json('config');
            $table->timestamps();

            $table->foreign('protocol_id')->references('id')->on(tableOf(Protocol::class))
            ;
        });
    }

    public function down(): void
    {
        Schema::dropIfExists($this->table);
    }
};
