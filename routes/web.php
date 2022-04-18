<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SmartController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/formulaire','App\Http\Controllers\SmartController@getFormulaires');

Route::post('/qcm/{id_form}',[SmartController::class,'getReponse']);

Route::get('/qcm/{id_form}',[SmartController::class,'getQcms']);


