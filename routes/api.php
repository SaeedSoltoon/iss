<?php

use App\Domains\Api\Http\Controllers\ApiController;
use App\Domains\Company\Http\Controllers\CompaniesController;
use App\Domains\Company\Http\Controllers\InsurancesController;

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
    Route::get('insurances', [CompaniesController::class, 'all']);
    Route::get('{companyId}/show', [CompaniesController::class, 'show']);
    Route::post('/', [CompaniesController::class, 'store'])->middleware('is_super_admin');
    Route::put('{companyId}/update', [CompaniesController::class, 'update'])->middleware('is_super_admin');
    Route::delete('{companyId}/delete', [CompaniesController::class, 'destroy'])->middleware('is_super_admin');
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'insurance'
], function ($router) {
    Route::get('/', [InsurancesController::class, 'index']);
    Route::get('companies', [InsurancesController::class, 'all']);
    Route::get('{insuranceId}/show', [InsurancesController::class, 'show']);
    Route::post('/', [InsurancesController::class, 'store'])->middleware('is_super_admin');
    Route::put('{insuranceId}/update', [InsurancesController::class, 'update'])->middleware('is_super_admin');
    Route::delete('{insuranceId}/delete', [InsurancesController::class, 'destroy'])->middleware('is_super_admin');
});
