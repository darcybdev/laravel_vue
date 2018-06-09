<?php

namespace App\Base\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

use App;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Base\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
/*
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));
*/
        Route::get('/', function () {
            return redirect()->route('home');
        });
        $modules = App::modules();
        foreach ($modules as $module) {
            $file = App::path('app/' . $module . '/routes.php');
            if (is_file($file)) {
                $name = basename($module);
                $nameLower = strtolower($name);
                Route::middleware('web')
                    ->prefix($nameLower)
                    ->namespace('App\\' . $name . '\\Http\\Controllers')
                    ->group($file);
            }
        }
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/api.php'));
    }
}
