<?php 
namespace App\Http\ViewComposers;

use App\Models\Categoria;
use Illuminate\Contracts\View\View;

class CategoriasComposer 
{
    public function compose(View $view)
    {
        $categorias = Categoria::orderBy('nombre')->get();

        $view->with('categorias' , $categorias);
    }
}