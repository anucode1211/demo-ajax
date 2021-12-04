<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


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

// Route::get('/user', function () {
//     return view('user');
// });
// use App\Http\Controllers\PostController;

// Route::get('/user', [UserController::class, 'index']);
// Route::post('submit-form', [UserController::class, 'submitForm']);

  
Route::get('my-form', [UserController::class, 'index']);
Route::post('my-form', [UserController::class, 'submitForm'])->name('my.form');