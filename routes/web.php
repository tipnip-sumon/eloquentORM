<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ContactController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('user',UserController::class);
Route::resource('member',MemberController::class);
Route::resource('contact',ContactController::class);