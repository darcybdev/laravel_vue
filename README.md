# laramod

Laramod is Laravel Modularized. The goal of this project is to extend the default Laravel setup to enable a modularized approach to Laravel.

## Why

With multiple projects running on Laravel, it quickly becomes apparent that spinning up a new project will require cherry picking files from throughout another project. Controllers, routes, models, it can be tedious to track these files down.

Nailed down that Auth module, and want to use it in another project? Simply copy it to your new project and you're done.

## Roadmap

Each task in the roadmap needs improvement, but here is a basic rundown of what works and doesn't

 - Routing - works
 - Migrations - works
 - Artisan - @see Artisan section
 - Seeds - @todo
 - Per module config - @todo

## Artisan

php artisan mod:create Videos

Should create Videos module at app/Videos, with the following files:

```
app/
    Videos/
        routes.php
        Controllers/
            VideosController.php
        database/
            migrations/
                2018_01_01_000000_create_videos_table.php
        Video.php
```

php artisan mod:list

Should list modules installed and enabled in site

## Routes

Each module can provide a routes.php file, which will be picked up by the app/Base/Providers/RouteServiceProvider. By default, each route defined here will be prefixed by the module name and be namespaced to the module's controller directory. For instance:

Users module has file routes.php, with:

Route::get('', 'UsersController@index');

This will route /users to app/Users/Controllers/UsersController.php and call method index

## Modules

Laramod includes 2 example modules (Auth, Users).

Also included are App and Base, which are required for Laramod to work, but can be edited and extended if needed.

### App

Common classes and utilities that other modules will want to use, for example:

```
// Get all modules:
App::modules();

// Get a path to a module:
App::path('app/Auth');

// Get all config data:
Config::get();
```

### Base

Base module that all other modules will extend some classes from (Model, Controller). Overrides a lot of Laravel classes to make modules possible, as well as inject some convenience. The directory structure here should match Illuminate.

### Auth

Handles authentication, registration, password resets. Depends on the User module

GET  /auth - Returns current logged in user or guest
POST /auth/login - Attempts login
POST /auth/reset - Sends reset password email
POST /auth/reset-confirm - Resets password with token
POST /auth/register - Registers new account

### User

Users of the application

GET /users - Returns list of users
POST /users - Create a user
PUT /users/{id} - Update a user
DELETE /users/{id} - Delete a user
