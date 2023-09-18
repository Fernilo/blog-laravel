<?php

use App\Http\Controllers\Admin\CategoriaController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\EtiquetaController;
use Illuminate\Support\Facades\Route;

Route::get('/' , [HomeController::class , 'index']);
Route::get('post/create',[PostController::class , 'create'])->name('post.create');
Route::post('post/store',[PostController::class , 'store'])->name('post.store');
Route::get('post/index', [PostController::class , 'index'])->name('admin.post.index');
Route::delete('post/{post}' , [PostController::class , 'destroy'])->name('post.destroy');
Route::get('post/edit/{id}' , [PostController::class , 'edit'])->name('post.edit');
Route::post('post/update/{post}' , [PostController::class , 'update'])->name('post.update');
Route::post('post/search/' , [PostController::class , 'searchById'])->name('post.search');
Route::get('post/download/{post}', [PostController::class , 'download'])->name('post.download');


Route::get('etiquetas/index' , [EtiquetaController::class , 'index'])->name('etiquetas.index');
Route::get('etiquetas/create',[EtiquetaController::class , 'create'])->name('etiquetas.create');
Route::post('etiquetas/store',[EtiquetaController::class , 'store'])->name('etiquetas.store');
Route::get('etiquetas/edit/{id}',[EtiquetaController::class , 'edit'])->name('etiquetas.edit');
Route::post('etiquetas/update/{etiqueta}',[EtiquetaController::class , 'update'])->name('etiquetas.update');
Route::delete('etiquetas/{etiqueta}' , [EtiquetaController::class , 'destroy'])->name('etiquetas.destroy');

Route::get('categorias/index' , [CategoriaController::class , 'index'])->name('categorias.index');
Route::get('categorias/create' , [CategoriaController::class , 'create'])->name('categorias.create');
Route::post('categorias/store' , [CategoriaController::class , 'store'])->name('categorias.store');
Route::patch('categorias/update{categoria}' , [CategoriaController::class , 'update'])->name('categorias.update');
Route::get('categorias/edit/{id}' , [CategoriaController::class , 'edit'])->name('categorias.edit');
Route::delete('categorias/{categoria}' , [CategoriaController::class , 'destroy'])->name('categorias.destroy');