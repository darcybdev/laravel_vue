<?php

namespace App\Base\Database\Console\Seeds;

use App\Base\Model;
use App\Common\File;
use App\Common\Module;

class SeedCommand extends \Illuminate\Database\Console\Seeds\SeedCommand
{
    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        if (! $this->confirmToProceed()) {
            return;
        }

        $this->resolver->setDefaultConnection($this->getDatabase());

        Model::unguarded(function () {
            // Get all module seeders
            foreach (Module::list() as $module) {
                $seederPath = File::path('app/' . $module . '/database/seeds/' . ucfirst($module) . 'Seeder.php');
                if (file_exists($seederPath)) {
                    require_once $seederPath;
                    $class = ucfirst($module) . 'Seeder';
                    $seeder = new $class;
                    $seeder->setContainer($this->laravel)->setCommand($this);
                    $seeder->__invoke();
                }
            }
        });
    }
}
