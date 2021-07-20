<?php

/** @var \Laravel\Lumen\Routing\Router $router */

use App\Models\User;

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
    $users = User::all();
    $rndstr = getRandomCode(7);
    $code = $rndstr . "-" . getRandomNumber(5);
    $codeExp = explode("-", $code);
    $number = getRandomNumber(5);
    echo $codeExp[2];
    dd(eanCheckDigit($codeExp[2], $number));
    // return $router->app->version();
});

$router->group(['prefix' => 'api', 'middleware' => 'auth'], function () use ($router) {
    $router->get('me', 'AuthController@me');
});

$router->group(['prefix' => 'api'], function () use ($router) {
    $router->post('register', 'AuthController@register');
    $router->post('login', 'AuthController@login');
});
