<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
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
    return view('auth.login');
});



Route::get('register',[RegisterController::class,'register']);
Route::post('register_post',[RegisterController::class,'signup']);
Route::post('login',[LoginController::class,'signin']);
Route::get('logout',[LoginController::class,'logout']);


Route::get('/home',[HomeController::class,'index']);


Route::prefix('contact/')->group(function () {
    Route::get('list',[ContactController::class,'index']);
    Route::get('create',[ContactController::class,'create']);
    Route::post('store',[ContactController::class,'store']);
    Route::get('edit/{id}',[ContactController::class,'edit']);
    Route::post('update/{id}',[ContactController::class,'update']);
    Route::get('delete/{id}',[ContactController::class,'destroy']);
    Route::get('show/{id}',[ContactController::class,'show']);

});
