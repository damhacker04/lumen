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

// Endpoint Public
$router->post('/register', 'AuthController@register');
$router->post('/login', 'AuthController@login');
$router->get('/products', 'ProductController@index');

// Endpoint Protected (Harus pakai Token)
$router->group(['middleware' => 'auth'], function () use ($router) {
    $router->post('/checkout', 'CheckoutController@store');
});
