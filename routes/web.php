<?php

use App\Http\Controllers\CursoController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [UserController::class,'index'])->name('users.index');
;
Route::get('/create', [UserController::class,'create'])->name('users.create');

Route::resource('curso', CursoController::class);