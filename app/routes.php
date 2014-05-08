<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

# Gestion des articles
Route::get('/', array('uses' => 'HomeController@home', 'as' => 'home'));
Route::model('party', 'Party');
Route::get('party/{party_id}', 'HomeController@party');
Route::post('comment', 'HomeController@comment');

# Gestion des connexions
Route::controller('auth', 'AuthController');
Route::controller('guest', 'GuestController');
Route::controller('/', 'CarteController'); 
 
App::missing(function()
{
    return 'Cette page n\'existe pas !';
});

