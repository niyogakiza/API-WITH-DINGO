<?php

use Dingo\Api\Routing\Router;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

$router = app(Router::class);
$router->version('v1', function (Router $router) {
    $router->group(['namespace' => 'App\Http\Controllers'], function (Router $router) {
        $router->group(['prefix' => 'status'], function(Router $router) {
            /* ping status */
            $router->get('ping', 'ServerController@ping');
            /* Versioning route */
            $router->get('version', 'ServerController@version');
        });
    });
    $router->group(['prefix' => 'weather'], function (Router $router) {
        $router->get('city/{city}/current', 'QueryController@current');
        $router->get('city/{city}/all', 'QueryController@all');
    });
    $router->resource('users', 'UserController');

});

