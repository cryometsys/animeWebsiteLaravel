<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AnimeController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\ExampleController;
use App\Http\Controllers\SettingsController;

//General routes
Route::get('/', [UserController::class, "showCorrectHomepage"])->name('signup');
// Route::get('/anime', [ExampleController::class, "animepage"]);
Route::get('/login', [ExampleController::class, "loginpage"])->middleware('guest')->name('login');
Route::post('/register', [UserController::class, 'register']);

//User routes
Route::get('/settings', [ExampleController::class, 'settings'])->middleware('auth');
Route::get('/user/{user:username}/overview', [UserController::class, "redirectOverview"])->name('overview');
Route::post('/overview', [UserController::class, "login"]);
Route::get('/user/{user:username}/favorites', [UserController::class, "favorites"])->name('favorites');
Route::get('/user/{user:username}/animelist', [UserController::class, "animeList"])->name('animelist');

//Follow routes
// Route::post('/user/{username}/follow', [UserController::class, 'followUser'])->name('follow');
Route::post('/create-follow/{user:username}', [FollowController::class, "createFollow"])->middleware('auth');
Route::post('/remove-follow/{user:username}', [FollowController::class, "removeFollow"])->middleware('auth');
Route::get('/{user:username}/social', [FollowController::class, "social"])->name('social')->middleware('auth');
Route::get('/{user:username}/search-users', [FollowController::class, 'searchUsers']);

//User settings routes
Route::post('/logout', [UserController::class, "logout"]);
Route::post('/manage-photo', [SettingsController::class, "changePhoto"]);
Route::post('/manage-cover', [SettingsController::class, "changeCover"]);
Route::post('/update-username', [SettingsController::class, 'updateUsername'])->name('update-username');
Route::post('/update-email', [SettingsController::class, 'updateEmail'])->name('update-email');
Route::post('/update-password', [SettingsController::class, 'updatePassword'])->name('update-password');

//Admin routes
Route::prefix('admin')->middleware('App\Http\Middleware\AdminMiddleware')->group(function () {
    Route::get('', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/animes', [AdminController::class, 'viewAnimes'])->name('admin.animes');
    Route::get('/animes/create', [AdminController::class, 'createAnime'])->name('admin.animes.create');
    Route::post('/animes', [AdminController::class, 'addAnime'])->name('admin.animes.store');
    Route::get('/animes/edit', [AdminController::class, 'editAnime'])->name('admin.animes.edit');
    Route::put('/animes', [AdminController::class, 'updateAnime'])->name('admin.animes.update');
    Route::delete('/animes/{anime:title}', [AdminController::class, 'destroyAnime'])->name('admin.animes.destroy');
    Route::get('/users', [AdminController::class, 'viewUsers'])->name('admin.users');
    Route::get('/admins', [AdminController::class, 'viewAdmins'])->name('admin.admins');
    Route::post('/users/{user:username}', [AdminController::class, 'deleteUser'])->name('admin.delete.user');
    Route::post('/admins/{user:username}', [AdminController::class, 'deleteAdmin'])->name('admin.delete.admin');
});



//Anime routes
Route::get('/anime/{anime:title}', [AnimeController::class, "showAnime"])->name('anime');