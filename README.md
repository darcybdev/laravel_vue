# laramod

Laramod is Laravel Modularized. The goal of this project is to extend the default Laravel setup to enable a modularized approach to Laravel.

## Why

With multiple projects running on Laravel, it quickly becomes apparent that spinning up a new project will require cherry picking files from throughout another project. Controllers, routes, models, it can be tedious to track these files down.

Nailed down that Auth module, and want to use it in another project? Simply copy it to your new project and you're done.

## Roadmap

Each task in the roadmap needs improvement, but here is a basic rundown of what works and doesn't

 - Routing - works
 - Migrations - works
 - Seeds - @todo
 - Per module config - @todo

## Routes

Each module can provide a routes.php file, which will be picked up by the app/Base/Providers/RouteServiceProvider. By default, each route defined here will be prefixed by the module name and be namespaced to the module's controller directory. For instance:

Users module has file routes.php, with:

Route::get('', 'UsersController@index');

This will route /users to app/Users/Controllers/UsersController.php and call method index
