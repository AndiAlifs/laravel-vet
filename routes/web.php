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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'api'], function () {
    Route::get('accounts', AccountController::class . '@indexAll');
    Route::get('accounts/{id}', AccountController::class . '@findOne');
    Route::post('accounts', AccountController::class . '@store');
});
