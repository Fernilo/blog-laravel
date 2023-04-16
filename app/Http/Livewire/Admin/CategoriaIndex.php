<?php

namespace App\Http\Livewire\Admin;

use App\Models\Categoria;
use Livewire\Component;
use Livewire\WithPagination;

class CategoriaIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $search;

    public function updatingSearch() 
    {
        $this->resetPage();//Elimina el parametro get de la paginacion en la URL
    }

    public function render()
    {
        $categorias = Categoria::where('nombre', 'LIKE' ,'%' .$this->search .'%')
            ->latest('id')
            ->paginate();
      
        return view('livewire.admin.categorias-index' , compact('categorias'));
    }
}
