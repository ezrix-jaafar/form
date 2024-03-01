<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::post('/prospect', 'App\Http\Controllers\ProspectController@store');

Route::get('/prospect', 'App\Http\Controllers\ProspectController@create');

Route::post('/webprospect', 'App\Http\Controllers\WebProspectController@store');

Route::get('/webprospect', 'App\Http\Controllers\WebProspectController@create');
