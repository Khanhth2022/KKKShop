<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::post('/login',[AuthController::class,'login'])->name('login');
Route::post('/register',[AuthController::class,'register'])->name('register');
Route::post('/logout',[AuthController::class,'logout'])->name('logout');
Route::get('/login',[AuthController::class,'viewLogin'])->name('viewLogin');
Route::get('/register',[AuthController::class,'viewRegister'])->name('viewRegister');
