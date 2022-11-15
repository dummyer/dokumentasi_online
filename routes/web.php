<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Doc\DocController;
use App\Http\Controllers\AdminController;

use Illuminate\Support\Facades\View;

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


Route::post('/doc/search_doc', [DocController::class, 'search_doc']);
Route::post('/doc/change_version', [DocController::class, 'change_version']);
Route::get('/doc/{version}/{menu?}', [DocController::class, 'index']);

Route::get('/admin', [AdminController::class, 'index']);