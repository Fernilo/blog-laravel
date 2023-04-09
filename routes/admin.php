<?php

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\EtiquetaController;
use Illuminate\Support\Facades\Route;

Route::get('' , [HomeController::class , 'index']);
Route::get('post/create',[PostController::class , 'create'])->name('post.create');
Route::post('post/store',[PostController::class , 'store'])->name('post.store');
Route::get('post/index', [PostController::class , 'index'])->name('post.index');

Route::get('etiquetas/index' , [EtiquetaController::class , 'index'])->name('etiquetas.index');
Route::get('etiquetas/create',[EtiquetaController::class , 'create'])->name('etiquetas.create');
Route::post('etiquetas/store',[EtiquetaController::class , 'store'])->name('etiquetas.store');
Route::get('etiquetas/edit/{id}',[EtiquetaController::class , 'edit'])->name('etiquetas.edit');
Route::post('etiquetas/update/{etiqueta}',[EtiquetaController::class , 'update'])->name('etiquetas.update');
Route::delete('etiquetas/{etiqueta}' , [EtiquetaController::class , 'destroy'])->name('etiquetas.destroy');