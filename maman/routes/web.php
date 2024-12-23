<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\AuthController;
use App\Http\Controllers\MealPlanController;

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Routes protégées
Route::middleware([\App\Http\Middleware\PasswordAuthMiddleware::class])->group(function () {
    Route::get('/', function () {
        return view('home');
    });
    Route::resource('shopping-lists', \App\Http\Controllers\ShoppingListController::class);
    Route::get('/meal-plans', [MealPlanController::class, 'index'])->name('meal-plans.index');
    Route::get('/meal-plans/{date}', [MealPlanController::class, 'show'])->name('meal-plans.show');
    Route::put('/meal-plans/{id}', [MealPlanController::class, 'update'])->name('meal-plans.update');
});

