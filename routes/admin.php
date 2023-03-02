<?php

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\PostController;
use Illuminate\Support\Facades\Route;

Route::get('' , [HomeController::class , 'index']);
Route::get('post/create',[PostController::class , 'create']);
Route::post('post/store',[PostController::class , 'store'])->name('post.store');
Route::get('post/index', [PostController::class , 'index'])->name('post.index');