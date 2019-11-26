<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::namespace('Api') -> group(function() {
    Route::get('/people', 'PeoplesController@index');
    Route::get('/people/search', 'PeoplesController@search');
    Route::get('/people/{id}', 'PeoplesController@find');
    Route::get('/planets', 'PlanetsController@index');
    Route::get('/starships', 'StarshipsController@index');
});
