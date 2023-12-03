<?php

namespace App\Extensions\Database;

use Illuminate\Database\Migrations\Migration;

abstract class ModellableMigration extends Migration
{
    protected string $model;
    protected string $table;

    public function __construct()
    {
        $this->table = (new $this->model)->getTable();
    }
}
