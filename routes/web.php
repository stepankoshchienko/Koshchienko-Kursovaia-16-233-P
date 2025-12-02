<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CartController;
use Inertia\Inertia;
use App\Http\Controllers\StaticPageController;

Route::get('/vacancies', [StaticPageController::class, 'vacancies'])->name('vacancies');
Route::get('/terms', [StaticPageController::class, 'terms'])->name('terms');
Route::get('/privacy', [StaticPageController::class, 'privacy'])->name('privacy');

// главная
Route::get('/', fn() => Inertia::render('Welcome'));

//Регистрация
Route::get('/register', [AuthController::class, 'registerForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']); 

//Вход
Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

//Выход
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Профиль
Route::get('/profile', [ProfileController::class, 'profile'])->name('profile');
Route::put('/profile', [ProfileController::class, 'update']);

// Корзина
Route::get('/cart', [CartController::class, 'cart'])->name('cart');
Route::post('/cart', [CartController::class, 'cart']); 