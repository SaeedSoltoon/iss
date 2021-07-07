<?php

use App\Domains\Api\Http\Controllers\ApiController;
use App\Domains\Company\Http\Controllers\CompaniesController;


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
    'prefix' => 'auth'
], function () {
    Route::post('login', [ApiController::class, 'login']);
    Route::post('logout', [ApiController::class, 'logout']);
    Route::post('refresh', [ApiController::class, 'refresh']);
    Route::post('me', [ApiController::class, 'me']);
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'insurance-company'
], function ($router) {
    Route::get('/', [CompaniesController::class, 'index']);
    Route::post('/', [CompaniesController::class, 'store'])->middleware('is_super_admin');
    Route::get('{company_id}/show', [CompaniesController::class, 'show']);
    Route::put('{company_id}/update', [CompaniesController::class, 'update']);
});
