<?php

namespace App\Base\Console\Commands;

use Illuminate\Console\Command;

use App\Common\Module;
use App\Common\File;

class ModuleMakeCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:module {moduleName}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new module';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $name = $this->argument('moduleName');
        $name = ucfirst($name);
        if (Module::exists($name)) {
            $this->error('Module: ' . $name . ' already exists');
            return;
        }
        $path = File::path('app/' . $name);
        mkdir($path, 0755);

        // Reset App module cache
        Module::reset();

        $modelName = rtrim($name, 's');

        // Create model, migration, factory and controller
        $this->call('make:model', [
            'module' => $name,
            'name' => ucfirst($modelName),
            '--all' => true
        ]);

        // Create routes file
        $stub = file_get_contents(File::path('app/Base/stubs/routes.stub'));
        $stub = str_replace('DummyControllerClass', $name . 'Controller', $stub);
        file_put_contents($path . '/routes.php', $stub);

        $this->info('Module: ' . $name . ' created at app/' . $name);
    }
}
