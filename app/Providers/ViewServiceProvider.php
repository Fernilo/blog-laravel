<?php

namespace App\Providers;

use App\Models\Categoria;
use App\View\Composers\ProfileComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // View::composer(['*'] , 'App\Http\ViewComposers\CategoriasComposer');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // View::composer('categorias' , function($view) {
        //     $view->with('categorias' , Categoria::get()->orderBy('nombre'));
        // });
    }
}
