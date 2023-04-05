<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Etiqueta;
use Livewire\WithPagination;

class EtiquetaIndex extends Component
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
        $etiquetas = Etiqueta::where('nombre', 'LIKE' ,'%' .$this->search .'%')
            ->latest('id')
            ->paginate();
      
        return view('livewire.admin.etiquetas-index' , compact('etiquetas'));
    }
}
