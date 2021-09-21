<?php

use App\Http\Controllers\QuestionsController;
use App\Http\Controllers\LoginController;
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::post('/questions', [QuestionsController::class, "store"]);

// Route::post('/questions', [QuestionsController::class, "store"]);
Route::get('/questions/search/{titulo}', [QuestionsController::class, "search"]);

Route::resource('questions', QuestionsController::class);
