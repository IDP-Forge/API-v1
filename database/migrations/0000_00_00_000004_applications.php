<?php

use App\Models\Protocol;
use App\Models\Application;
use App\Models\IdentityProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
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
            $table->bigInteger('provider_id')->unsigned()->nullable();
            $table->integer('protocol_id')->unsigned();
            $table->boolean('active')->default(1);
            $table->string('title');
            $table->text('description');
            $table->json('config');
            $table->timestamps();

            $table->foreign('provider_id')->references('id')->on(tableof(IdentityProvider::class))->onDelete('set null');
            $table->foreign('protocol_id')->references('id')->on(tableOf(Protocol::class))->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists($this->table);
    }
};
