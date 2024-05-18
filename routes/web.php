<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExampleController;



Route::get('/', [UserController::class, "showCorrectHomepage"]);
Route::get('/anime', [ExampleController::class, "animepage"]);
Route::get('/login', [ExampleController::class, "loginpage"]);
Route::get('/settings', [ExampleController::class, 'settings']);

Route::post('/register', [UserController::class, 'register']);
Route::post('/overview', [UserController::class, "login"]);
Route::post('/logout', [UserController::class, "logout"]);