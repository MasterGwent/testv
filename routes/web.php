<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ReklamationController;
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

Route::middleware('guest')->namespace('\App\Http\Controllers')->group(function () {
    Route::get('/login', function () {
        return view('login');
    })->name('login');

    Route::post('/login', 'AuthController@postSignin');
});

Route::controller(AuthController::class)->group(function () {
    Route::get('/reg', function () {
        return view('reg');
    });

    Route::post('/reg', 'postReg');
});

Route::controller(ReklamationController::class)->group(function () {
    Route::get('/reklamations/{status?}', 'getReklamations');

    Route::group(['middleware' => 'auth'], function () {
        Route::post('/reklamations/', 'addReklamation');
        Route::get('/reklamations/{id}/', 'getReklamationById');
        Route::delete('/reklamations/{id}/', 'deleteReklamationById');
        Route::put('/reklamations/{id}/', 'updateReklamationById');
        Route::get('/reklamations/sort/created_date','timeCreateReklamation');
        Route::get('/token/', function () {
            return csrf_token();
        });
    });
});

Route::middleware('auth')->namespace('\App\Http\Controllers')->group(function () {
    Route::get('/test/', function () {
       return 'ok';
    });
});
