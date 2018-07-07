# laramod-api

Laramod api is a server side project, ready to be used with your front end app. It is built on the Laravel Modularized project: https://github.com/jbizzay/laramod

## Installation

```
composer install
php artisan db:migrate
composer start
```

This should install all dependencies and spin up a php server running the api at http://localhost:8877. 

There are many different ways of setting up a single repo or separate repos for client and server apps, which will be covered later.

## Modules

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

Base module that all other modules extend their classes from. Overrides a lot of Laravel classes to make modules possible, as well as inject some convenience into common extended classes. The directory structure here should match Illuminate.

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

