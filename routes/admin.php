<?php

use App\Http\Controllers\Admin\CategoriaController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\EtiquetaController;
use Illuminate\Support\Facades\Route;

Route::get('/' , [HomeController::class , 'index'])->name('admin.home.index');

Route::get('post/create',[PostController::class , 'create'])->name('admin.post.create');
Route::post('post/store',[PostController::class , 'store'])->name('admin.post.store');
Route::get('post/index', [PostController::class , 'index'])->name('admin.post.index');
Route::get('post/drafts', [PostController::class , 'drafts'])->name('admin.post.drafts');
Route::get('post/published', [PostController::class , 'published'])->name('admin.post.published');
Route::delete('post/{post}' , [PostController::class , 'destroy'])->name('admin.post.destroy');
Route::get('post/edit/{id}' , [PostController::class , 'edit'])->name('admin.post.edit');
Route::post('post/update/{post}' , [PostController::class , 'update'])->name('admin.post.update');
Route::post('post/search/' , [PostController::class , 'searchById'])->name('admin.post.search');
Route::get('post/download/{post}', [PostController::class , 'download'])->name('admin.post.download');


Route::get('etiquetas/index' , [EtiquetaController::class , 'index'])->name('admin.etiquetas.index');
Route::get('etiquetas/create',[EtiquetaController::class , 'create'])->name('admin.etiquetas.create');
Route::post('etiquetas/store',[EtiquetaController::class , 'store'])->name('admin.etiquetas.store');
Route::get('etiquetas/edit/{id}',[EtiquetaController::class , 'edit'])->name('admin.etiquetas.edit');
Route::post('etiquetas/update/{etiqueta}',[EtiquetaController::class , 'update'])->name('admin.etiquetas.update');
Route::delete('etiquetas/{etiqueta}' , [EtiquetaController::class , 'destroy'])->name('admin.etiquetas.destroy');

Route::get('categorias/index' , [CategoriaController::class , 'index'])->name('admin.categorias.index');
Route::get('categorias/create' , [CategoriaController::class , 'create'])->name('admin.categorias.create');
Route::post('categorias/store' , [CategoriaController::class , 'store'])->name('admin.categorias.store');
Route::patch('categorias/update{categoria}' , [CategoriaController::class , 'update'])->name('admin.categorias.update');
Route::get('categorias/edit/{id}' , [CategoriaController::class , 'edit'])->name('admin.categorias.edit');
Route::delete('categorias/{categoria}' , [CategoriaController::class , 'destroy'])->name('admin.categorias.destroy');