<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Route::get('/', 'WelcomeController@index');

Route::resource(
  'quote',
  'QuoteController',
  ['only' => ['store', 'index', 'show']]
);

// Fetch a secret resource
Route::get('secret/{id}', ['as' => 'secret.show', 'uses' => 'SecretController@show']);

// Create a secret resource
Route::post('secret', ['as' => 'secret.store', 'uses' => 'SecretController@store']);

// Update a secret resource
Route::put('secret{id}', ['as' => 'secret.update', 'uses' => 'SecretController@update']);

// Remove a secret resource
Route::delete('secret{id}', ['as' => 'secret.destroy', 'uses' => 'SecretController@destroy']);
