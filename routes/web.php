<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\ExampleController;
use App\Http\Controllers\SettingsController;

//General routes
Route::get('/', [UserController::class, "showCorrectHomepage"])->name('signup');
Route::get('/anime', [ExampleController::class, "animepage"]);
Route::get('/login', [ExampleController::class, "loginpage"])->middleware('guest')->name('login');
Route::post('/register', [UserController::class, 'register']);

//User routes
Route::get('/settings', [ExampleController::class, 'settings'])->middleware('auth');
Route::get('/user/{user:username}/overview', [UserController::class, "redirectOverview"])->name('overview');
Route::post('/overview', [UserController::class, "login"]);
Route::get('/user/{user:username}/favorites', [UserController::class, "favorites"])->name('favorites');
Route::get('/user/{user:username}/animelist', [UserController::class, "animeList"])->name('animelist');
Route::get('/user/{user:username}/social', [UserController::class, "social"])->name('social')->middleware('auth');

//Follow routes
// Route::post('/user/{username}/follow', [UserController::class, 'followUser'])->name('follow');
Route::post('/create-follow/{user:username}', [FollowController::class, "createFollow"])->middleware('auth');
Route::post('/remove-follow/{user:username}', [FollowController::class, "removeFollow"])->middleware('auth');

//User settings routes
Route::post('/logout', [UserController::class, "logout"]);
Route::post('/manage-photo', [SettingsController::class, "changePhoto"]);
Route::post('/manage-cover', [SettingsController::class, "changeCover"]);
Route::post('/update-username', [SettingsController::class, 'updateUsername'])->name('update-username');
Route::post('/update-email', [SettingsController::class, 'updateEmail'])->name('update-email');
Route::post('/update-password', [SettingsController::class, 'updatePassword'])->name('update-password');
