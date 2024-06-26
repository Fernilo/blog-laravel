<?php

use App\Http\Controllers\Admin\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TestController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [PostController::class , 'index' ])
    ->name('post.index');

Route::get('/posts/{post}' , [PostController::class , 'show'])
    ->name('post.show');

Route::get('/categoria/{categoria}' , [PostController::class , 'categoria'])
    ->name('post.categoria');

Route::get('/etiqueta/{etiqueta}' , [PostController::class , 'etiqueta'])
    ->name('post.etiqueta');

Route::get('/post/buscador' , [PostController::class , 'buscador'])
    ->name('post.buscador');

Route::get('/test-exception', TestController::class);

require __DIR__.'/auth.php';
