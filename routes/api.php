<?php

use Illuminate\Http\Request;

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

Route::group([
    'middleware' => 'api',
    'namespace' => 'App\Domains\Api\Http\Controllers',
    'prefix' => 'auth'
], function () {
    Route::post('login', 'ApiController@login');
    Route::post('logout', 'ApiController@logout');
    Route::post('refresh', 'ApiController@refresh');
    Route::post('me', 'ApiController@me');
});

Route::group([
    'middleware' => 'api',
    'namespace' => 'App\Domains\Company\Http\Controllers',
    'prefix' => 'insurance-company'
], function ($router) {
    Route::get('/', 'CompaniesController@index');
    Route::post('new', 'CompaniesController@store')->middleware('is_super_admin');
    Route::get('{company_id}/show', 'CompaniesController@show');
    Route::put('{company_id}/update', 'CompaniesController@update');
});
