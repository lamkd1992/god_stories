<?php

namespace App\Console\Commands;

use Illuminate\Console\GeneratorCommand;
use Symfony\Component\Console\Exception\InvalidArgumentException;
use Symfony\Component\Console\Input\InputArgument;

class RepositoryMakeCommand extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $name = 'make:repository';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new model repository';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Repository';

    /**
     * The name of repository class being generated.
     *
     * @var string
     */
    private $repositoryClass;

    /**
     * The name of repository interface class being generated.
     *
     * @var string
     */
    private $repositoryInterfaceClass;

    /**
     * The name of class being generated.
     *
     * @var string
     */
    private $model;

    /**
     * Execute the console command.
     *
     * @return bool|null
     */
    public function handle()
    {
        $this->setRepositoryClass();
        if ($this->alreadyExists($this->repositoryClass)) {
            $this->error($this->type.' already exists!');

            return false;
        }

        // Create Interface
        $interfacePath = $this->getPath($this->repositoryInterfaceClass);

        $this->makeDirectory($interfacePath);

        $this->files->put($interfacePath, $this->buildClass($this->repositoryInterfaceClass));
        // Create repository
        $repositoryPath = $this->getPath($this->repositoryClass);

        $this->makeDirectory($repositoryPath);

        $this->files->put($repositoryPath, $this->buildClass($this->repositoryClass));

        $this->info($this->type.' created successfully.');

        $this->line("<info>Created Repository :</info> $this->repositoryClass");
    }

    /**
     * Set repository class name
     *
     * @return  void
     */
    private function setRepositoryClass()
    {
        $this->model = $this->argument('name');

        $modelClass = $this->qualifyClass($this->getNameInput());

        $this->repositoryClass = $modelClass.'Repository';

        $interfaceClass = $this->qualifyClass('\Interfaces\\'.$this->getNameInput());
        $this->repositoryInterfaceClass = $interfaceClass.'RepositoryInterface';

        return $this;
    }

    /**
     * Replace the class name for the given stub.
     *
     * @param  string  $stub
     * @param  string  $name
     * @return string
     */
    protected function replaceClass($stub, $name)
    {
        if (! $this->argument('name')) {
            throw new InvalidArgumentException('Missing required argument model name');
        }

        $stub = parent::replaceClass($stub, $name);

        return str_replace('DummyModel', $this->model, $stub);
    }

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return base_path('stubs/Repository.stub');
    }

    /**
     * Build the class with the given name.
     *
     * @param  string  $name
     * @return string
     *
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    protected function buildClass($name)
    {
        $stubPath = $name == $this->repositoryClass ? base_path('stubs/Repository.stub') : base_path('stubs/RepositoryInterface.stub');
        $stub = $this->files->get($stubPath);

        return $this->replaceNamespace($stub, $name)->replaceClass($stub, $name);
    }

    /**
     * Get the default namespace for the class.
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace.'\Repositories';
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return [
            ['name', InputArgument::REQUIRED, 'The name of the model class.'],
        ];
    }
}
