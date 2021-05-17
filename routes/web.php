<?php

/** @var \Laravel\Lumen\Routing\Router $router */

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

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['middleware' => 'auth','prefix' => 'api'], function ($router)
{
    $router->get('me', 'AuthController@me');

    $router->get('/email-users', 'EmailUserController@index');
    $router->get('/email-users/{id}', 'EmailUserController@show');
    $router->post('/email-users', 'EmailUserController@create');
    $router->get('/email-users/{id}/opt-out', 'EmailUserController@optOut');
});

$router->group(['prefix' => 'api'], function () use ($router)
{
    $router->post('register', 'AuthController@register');
    $router->post('login', 'AuthController@login');
});

