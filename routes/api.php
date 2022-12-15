<?php

use App\Http\Controllers\API\CreateCompany;
use App\Http\Controllers\API\GetCompanies;
use App\Http\Controllers\API\UpdateCompany;
use Illuminate\Support\Facades\Route;

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

Route::get('/companies', GetCompanies::class)->name('api.companies');
Route::post('/companies', CreateCompany::class)->name('api.companies.store');
Route::patch('/companies/{company}', UpdateCompany::class)->name('api.companies.update');
