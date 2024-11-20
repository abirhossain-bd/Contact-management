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
})->name('login');



Route::get('register',[RegisterController::class,'register'])->name('register');
Route::post('user_register',[RegisterController::class,'signup'])->name('user.register');
Route::post('login',[LoginController::class,'signin'])->name('user.login');
Route::get('logout',[LoginController::class,'logout'])->name('logout');


Route::get('/home',[HomeController::class,'index'])->name('home');


Route::prefix('contact/')->group(function () {
    Route::get('list',[ContactController::class,'index'])->name('contact.list');
    Route::get('create',[ContactController::class,'create'])->name('contact.create');
    Route::post('store',[ContactController::class,'store'])->name('contact.store');
    Route::get('edit/{id}',[ContactController::class,'edit'])->name('contact.edit');
    Route::post('update/{id}',[ContactController::class,'update'])->name('contact.update');
    Route::get('delete/{id}',[ContactController::class,'destroy'])->name('contact.delete');
    Route::get('show/{id}',[ContactController::class,'show'])->name('contact.show');

});
