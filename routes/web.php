<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\SiteController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('logs',[SiteController::class,'getLogs']);
Route::get('sessions',[SiteController::class,'getSessions']);
Route::get('/',[SiteController::class,'getSessions']);
Route::get('session/{id}',[SiteController::class,'getLogs']);
Route::get('chatbot',[SiteController::class,'chatbot']);

Route::prefix('admin')->group(function () {
    Route::get('/add-question',[AdminController::class,'questions']);
    Route::post('/add-question',[AdminController::class,'addQuestion']);
});
