<?php

use Illuminate\Support\Facades\Route;
use Monolog\Handler\RotatingFileHandler;

use App\Http\Controllers\AccountController;

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

Route::get('/', AccountController::class . '@index');
Route::post('/accounts', AccountController::class . '@save')->name('accounts.save');
Route::delete('/accounts/{id}', AccountController::class . '@destroy')->name('accounts.delete');
Route::put('accounts/{id}', AccountController::class . '@update')->name('accounts.update');

