<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/
$api = app('Dingo\Api\Routing\Router');
/*$app->get('/', function () use ($app) {
    return $app->welcome();
});*/


$api->version('v1', function ($api) {

    $api->get('test', function () {
        return 'It is ok';
    });

    $api->get('getPrograms', 'App\Http\Controllers\ProgramController@getPrograms');
    $api->get('program/{id}', 'App\Http\Controllers\ProgramController@getProgram');
    $api->get('program/{id}/speakers', 'App\Http\Controllers\ProgramController@getProgramWithSpeakers');
    $api->get('programs', 'App\Http\Controllers\ProgramController@getAllProgramDetail');
    $api->post('filter', 'App\Http\Controllers\ProgramController@filter');
    $api->post('eager', 'App\Http\Controllers\ProgramController@eager');
    $api->post('orm', 'App\Http\Controllers\ProgramController@orm');
    $api->get('withPivot', 'App\Http\Controllers\ProgramController@withPivot');





});


$app->post("/oauth/access_token", function () use ($app){

    return response()->json($app->make('oauth2-server.authorizer')->issueAccessToken());
});





$api->version('v2', function ($api) {

    $api->get('test', function () {
        return 'This is API v2';
    });



});