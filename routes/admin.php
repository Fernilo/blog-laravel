<?php

use App\Http\Controllers\Admin\CategoriaController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\EtiquetaController;
use App\Http\Controllers\Admin\UsuarioController;
use App\Http\Controllers\Admin\RolController;
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
Route::get('etiquetas/create',[EtiquetaController::class , 'create'])->middleware('can:admin.etiquetas.create')->name('admin.etiquetas.create');
Route::post('etiquetas/store',[EtiquetaController::class , 'store'])->name('admin.etiquetas.store');
Route::get('etiquetas/edit/{id}',[EtiquetaController::class , 'edit'])->middleware('can:admin.etiquetas.edit')->name('admin.etiquetas.edit');
Route::patch('etiquetas/update/{etiqueta}',[EtiquetaController::class , 'update'])->name('admin.etiquetas.update');
Route::delete('etiquetas/{etiqueta}' , [EtiquetaController::class , 'destroy'])->middleware('can:admin.etiquetas.destroy')->name('admin.etiquetas.destroy');

Route::get('categorias/index' , [CategoriaController::class , 'index'])->name('admin.categorias.index');
Route::get('categorias/create' , [CategoriaController::class , 'create'])->middleware('can:admin.categorias.create')->name('admin.categorias.create');
Route::post('categorias/store' , [CategoriaController::class , 'store'])->name('admin.categorias.store');
Route::patch('categorias/update/{categoria}' , [CategoriaController::class , 'update'])->name('admin.categorias.update');
Route::get('categorias/edit/{id}' , [CategoriaController::class , 'edit'])->middleware('can:admin.categorias.edit')->name('admin.categorias.edit');
Route::delete('categorias/{categoria}' , [CategoriaController::class , 'destroy'])->middleware('can:admin.categorias.destroy')->name('admin.categorias.destroy');

Route::get('usuarios/index', [UsuarioController::class, 'index'])->middleware('can:admin.usuarios.index')->name('admin.usuarios.index');
Route::get('usuarios/create', [UsuarioController::class, 'create'])->middleware('can:admin.usuarios.create')->name('admin.usuarios.create');
Route::post('usuarios/store', [UsuarioController::class, 'store'])->name('admin.usuarios.store');
Route::patch('usuarios/update/{usuario}', [UsuarioController::class, 'update'])->name('admin.usuarios.update');
Route::get('usuarios/edit/{id}', [UsuarioController::class, 'edit'])->middleware('can:admin.usuarios.edit')->name('admin.usuarios.edit');
Route::delete('usuarios/{usuario}', [UsuarioController::class, 'destroy'])->middleware('can:admin.usuarios.destroy')->name('admin.usuarios.destroy');

Route::get('roles/index', [RolController::class, 'index'])->middleware('can:admin.roles.index')->name('admin.roles.index');
Route::get('roles/create', [RolController::class, 'create'])->middleware('can:admin.roles.create')->name('admin.roles.create');
Route::post('roles/store', [RolController::class, 'store'])->name('admin.roles.store');
Route::patch('roles/update/{rol}', [RolController::class, 'update'])->name('admin.roles.update');
Route::get('roles/edit/{id}', [RolController::class, 'edit'])->middleware('can:admin.roles.edit')->name('admin.roles.edit');
Route::delete('roles/{rol}', [RolController::class, 'destroy'])->middleware('can:admin.roles.destroy')->name('admin.roles.destroy');