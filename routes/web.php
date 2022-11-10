<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Doc\DocController;

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


Route::get('/doc/{version}/{menu?}', [DocController::class, 'index']);