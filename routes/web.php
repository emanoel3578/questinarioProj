<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/{any}', function () {
    return view('welcome');
})->where('any', '.*');

// Route::get('/register', function() {
//     return view('register');
// });

// Route::get('/home', function() {
//     return view('welcome');
// });

// Route::get('/formulario', function() {
//     return view('welcome');
// });

// Route::get('/criar', function() {
//     return view('welcome');
// });

// Route::post('/login', [LoginController::class, "authenticate"]);
