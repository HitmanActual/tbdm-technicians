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

$router->group(['prefix' => 'v1', 'namespace' => 'Api\v1'], function() use($router)
{

    $router->get('technicians','TechnicianController@index');
    $router->post('technicians','TechnicianController@store');
    $router->get('technicians/{technician}','TechnicianController@show');
    $router->put('technicians/{technician}','TechnicianController@update');
    $router->patch('technicians/{technician}','TechnicianController@update');
    $router->delete('technicians/{technician}','TechnicianController@destroy');
});
