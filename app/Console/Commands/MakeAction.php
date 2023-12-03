<?php

namespace App\Console\Commands;

use Illuminate\Console\GeneratorCommand;

class MakeAction extends GeneratorCommand
{
    protected $signature = 'make:action {name}';

    protected $description = 'Create a new Action class';

    /**
     * Execute the console command.
     *
     * @return int|bool
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function handle(): int | bool
    {
        if ($this->isReservedName($this->getNameInput()))
        {
            $this->error('The name "'.$this->getNameInput().'" is reserved by PHP.');

            return false;
        }

        $name = $this->qualifyClass(sprintf("App/%s", $this->getNameInput()));

        $path = $this->getPath($name);

        $class = $this->buildClass($name);

        if($this->alreadyExists($name))
        {
            $this->error($name.' already exists!');

            return false;
        }

        $this->makeDirectory($path);

        $this->files->put($path, $class);

        $this->info($name.' created successfully.');

        return 0;
    }

    protected function getStub()
    {
        return base_path('stubs/action.stub');
    }
}
