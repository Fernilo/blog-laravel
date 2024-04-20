<?php

use App\Http\Controllers\Admin\CategoriaController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\EtiquetaController;
use App\Http\Controllers\Admin\UsuarioController;
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
Route::get('etiquetas/create',[EtiquetaController::class , 'create'])->name('admin.etiquetas.create')->middleware('can:admin.etiquetas.create');
Route::post('etiquetas/store',[EtiquetaController::class , 'store'])->name('admin.etiquetas.store')->middleware('can:admin.etiquetas.store');
Route::get('etiquetas/edit/{id}',[EtiquetaController::class , 'edit'])->middleware('can:admin.etiquetas.edit')->name('admin.etiquetas.edit');
Route::patch('etiquetas/update/{etiqueta}',[EtiquetaController::class , 'update'])->middleware('can:admin.etiquetas.update')->name('admin.etiquetas.update');
Route::delete('etiquetas/{etiqueta}' , [EtiquetaController::class , 'destroy'])->middleware('can:admin.etiquetas.destroy')->name('admin.etiquetas.destroy');

Route::get('categorias/index' , [CategoriaController::class , 'index'])->name('admin.categorias.index');
Route::get('categorias/create' , [CategoriaController::class , 'create'])->middleware('can:admin.categorias.create')->name('admin.categorias.create');
Route::post('categorias/store' , [CategoriaController::class , 'store'])->middleware('can:admin.categorias.store')->name('admin.categorias.store');
Route::patch('categorias/update/{categoria}' , [CategoriaController::class , 'update'])->middleware('can:admin.categorias.update')->name('admin.categorias.update');
Route::get('categorias/edit/{id}' , [CategoriaController::class , 'edit'])->middleware('can:admin.categorias.edit')->name('admin.categorias.edit');
Route::delete('categorias/{categoria}' , [CategoriaController::class , 'destroy'])->middleware('can:admin.categorias.destroy')->name('admin.categorias.destroy');

Route::get('usuarios/index', [UsuarioController::class, 'index'])->middleware('can:admin.usuarios.index')->name('admin.usuarios.index');
Route::get('usuarios/create', [UsuarioController::class, 'create'])->middleware('can:admin.usuarios.create')->name('admin.usuarios.create');
Route::post('usuarios/store', [UsuarioController::class, 'store'])->middleware('can:admin.usuarios.store')->name('admin.usuarios.store');
Route::patch('usuarios/update/{usuario}', [UsuarioController::class, 'update'])->middleware('can:admin.usuarios.update')->name('admin.usuarios.update');
Route::get('usuarios/edit/{id}', [UsuarioController::class, 'edit'])->middleware('can:admin.usuarios.edit')->name('admin.usuarios.edit');
Route::delete('usuarios/{usuario}', [UsuarioController::class, 'destroy'])->middleware('can:admin.usuarios.destroy')->name('admin.usuarios.destroy');