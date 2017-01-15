## Lumen PHP Framework

[![Build Status](https://travis-ci.org/laravel/lumen-framework.svg)](https://travis-ci.org/laravel/lumen-framework)
[![Total Downloads](https://poser.pugx.org/laravel/lumen-framework/d/total.svg)](https://packagist.org/packages/laravel/lumen-framework)
[![Latest Stable Version](https://poser.pugx.org/laravel/lumen-framework/v/stable.svg)](https://packagist.org/packages/laravel/lumen-framework)
[![Latest Unstable Version](https://poser.pugx.org/laravel/lumen-framework/v/unstable.svg)](https://packagist.org/packages/laravel/lumen-framework)
[![License](https://poser.pugx.org/laravel/lumen-framework/license.svg)](https://packagist.org/packages/laravel/lumen-framework)

<<<<<<< Local Changes
- Composer Installation Open Terminal curl -sS https://getcomposer.org/installer | sudo php -- --install-dir=/usr/local/bin
--filename=composer
=======
Laravel Lumen is a stunningly fast PHP micro-framework for building web applications with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Lumen attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as routing, database abstraction, queueing, and caching.

## Official Documentation

Documentation for the framework can be found on the [Lumen website](http://lumen.laravel.com/docs).
>>>>>>> External Changes

<<<<<<< Local Changes
- Lumen Installation composer global require "laravel/lumen-installer=~1.0"

- Create New Project composer create-project laravel/lumen <projectname> "5.1.*" or lumen new <projectname> (Make sure to place
the ~/.composer/vendor/bin directory in your PATH so the lumen executable can be located by your system.)

- Dingo Installation composer require dingo/api:1.0.x@dev
=======
## Security Vulnerabilities
>>>>>>> External Changes

<<<<<<< Local Changes
#Configuration

@bootstrap/app.php - Uncomment .env file Dotenv::load(__DIR__.'/../');

- Enable facade&eloquent $app->withFacades(); $app->withEloquent();

- Register LumenServiceProvider.php $app->register(Dingo\Api\Provider\LumenServiceProvider::class);

- Set errorFormat $app['Dingo\Api\Exception\Handler']->setErrorFormat([ 'error' => [ 'message' => ':message', 'errors' =>
':errors', 'code' => ':code', 'status_code' => ':status_code', 'debug' => ':debug' ] ]);

- Create .env file or rename .env-example under the root folder

//Update Database information DB_CONNECTION=mysql DB_HOST=localhost DB_PORT=3306 DB_DATABASE=lumenDingdoDemo DB_USERNAME=root
DB_PASSWORD=root

//Add Api Information API_STANDARDS_TREE=vnd API_SUBTYPE=myapp API_PREFIX=api API_DEBUG=true API_VERSION=v1 API_NAME=api
API_DEFAULT_FORMAT=json

- @app/http/routes.php $api = app('Dingo\Api\Routing\Router'); //add first line

# OAuth2 Setup (source:https://github.com/lucadegasperi/oauth2-server-laravel/blob/master/docs/getting-started/lumen.md)

Composer is the recommended way to install this package. Add the following line to your composer.json file:

"lucadegasperi/oauth2-server-laravel": "^5.0" Then run composer update to get the package.

Register package

In your bootstrap/app.php register service providers

$app->register(\LucaDegasperi\OAuth2Server\Storage\FluentStorageServiceProvider::class);
$app->register(\LucaDegasperi\OAuth2Server\OAuth2ServerServiceProvider::class); ... and middleware

$app->middleware([ \LucaDegasperi\OAuth2Server\Middleware\OAuthExceptionHandlerMiddleware::class ]); ... and route middleware

$app->routeMiddleware([ 'check-authorization-params' =>
\LucaDegasperi\OAuth2Server\Middleware\CheckAuthCodeRequestMiddleware::class, 'oauth' =>
\LucaDegasperi\OAuth2Server\Middleware\OAuthMiddleware::class, 'oauth-client' =>
\LucaDegasperi\OAuth2Server\Middleware\OAuthClientOwnerMiddleware::class, 'oauth-user' =>
\LucaDegasperi\OAuth2Server\Middleware\OAuthUserOwnerMiddleware::class, ]); ... and Authorizer alias

class_alias(\LucaDegasperi\OAuth2Server\Facades\Authorizer::class, 'Authorizer'); Copy config

Copy vendor/lucadegasperi/oauth2-server-laravel/config/oauth2.php to your own config folder (config/oauth2.php in your project
root). It has to be the correct config folder as it is registered using $app->configure().

Migrate

First copy the migrations from vendor/lucadegasperi/oauth2-server-laravel/database/migrations to your applications
database/migrations directory.

If you get an error saying the Config class can not be found, add class_alias('Illuminate\Support\Facades\Config', 'Config'); to
your bootstrap/app.php file and uncomment $app->withFacades(); temporarily to import the migrations.

-OAuth2 Configuration

 @config/oauth2.php edit grant-types (password)

 'grant_types' => [

 'password' => [ 'class' => '\League\OAuth2\Server\Grant\PasswordGrant', 'callback' => '\App\PasswordGrantVerifier@verify',
'access_token_ttl' => 3600 ] ],
=======
If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell at taylor@laravel.com. All security vulnerabilities will be promptly addressed.
>>>>>>> External Changes

<<<<<<< Local Changes
#Migration php artisan migrate
=======
### License
>>>>>>> External Changes

<<<<<<< Local Changes
Thera are some example models,controllers,tranformers and migrations at the project. You can check that how it works or start to
create your own project!
=======
The Lumen framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)
>>>>>>> External Changes
