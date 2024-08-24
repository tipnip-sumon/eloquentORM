<?php

use App\Http\Controllers\MemberController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Middleware\ValidUser;
use PHPUnit\Framework\TestStatus\Risky;

Route::get('/', function () {
    return view('welcome');
});
Route::resource('user',UserController::class);
Route::resource('post',PostController::class);
// Route::resource('member',MemberController::class);
Route::get('/dashboard',[UserController::class,'dashboardPage'])->name('dashboard');
// Route::get('/dashboard',[UserController::class,'dashboardPage'])->name('dashboard')->middleware(ValidUser::class);
Route::get('/login',[UserController::class,'login'])->name('login');
Route::get('/profile/{pid}',[UserController::class,'ViewProfile'])->name('profile');
Route::post('/loginCheck',[UserController::class,'loginCheck'])->name('loginCheck');
Route::get('/logout',[UserController::class,'logout'])->name('logout');
Route::resource('post',PostController::class)->middleware('auth');
Route::get('/addpost',[PostController::class,'addpost'])->name('addpost')->middleware('auth');
Route::post('/login',[UserController::class,'loginCheck']);
