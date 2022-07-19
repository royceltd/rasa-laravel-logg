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
// Route::get('/',[SiteController::class,'getSessions']);
Route::get('/',[SiteController::class,'welcome']);
Route::get('/new-customer',[SiteController::class,'newCustomer']);
Route::post('/new-customer',[SiteController::class,'saveCustomer']);
Route::get('/feedback',[SiteController::class,'getQuestions']);
Route::get('session/{id}',[SiteController::class,'getLogs']);
Route::get('chatbot',[SiteController::class,'chatbot']);
Route::get('testchart',[SiteController::class,'testChart']);

Route::prefix('admin')->group(function () {
    Route::get('/add-question',[AdminController::class,'questions']);
    Route::post('/add-question',[AdminController::class,'addQuestion']);
    // Route::get('/answers',[AdminController::class,'getAnswers']);
    Route::get('/',[AdminController::class,'responses']);
    Route::get('/responses/{phone}',[AdminController::class,'getAnswers']);
    Route::get('visits',[AdminController::class,'getVisits']);
    Route::get('users',[AdminController::class,'users']);
    Route::post('users',[AdminController::class,'saveUsers']);
});
Route::prefix('clients')->group(function () {
    Route::get('/startquiz',[SiteController::class,'getQuestions']);
    Route::post('/startquiz',[SiteController::class,'saveStartquiz']);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
