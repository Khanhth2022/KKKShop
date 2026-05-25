<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::middleware('guest')->group(function (){
    Route::post('/login',[AuthController::class,'login'])->name('login');
    Route::post('/register',[AuthController::class,'register'])->name('register');
    Route::get('/login',[AuthController::class,'viewLogin'])->name('viewLogin');
    Route::get('/register',[AuthController::class,'viewRegister'])->name('viewRegister');
});

Route::middleware('auth')->group(function (){
    Route::post('/logout',[AuthController::class,'logout'])->name('logout');
    Route::post('/profile/edit',[AuthController::class,'editProfile'])->name('profile.update');
    Route::get('/profile/edit', function () {
        return view('auth.edit');
    })->name('profile.edit');
    Route::post('/profile/password',[AuthController::class,'editPassword'])->name('profile.password.update');
    Route::get('/profile/password', function () {
        return view('auth.editPassword');
    })->name('profile.password.edit');
    Route::get('/orders',[UserController::class,'viewOrders'])->name('orders.index');
});


