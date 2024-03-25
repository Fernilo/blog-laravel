<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UsuariosIndex extends Component
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
        $usuarios = User::where('name', 'LIKE' ,'%' .$this->search .'%')
            ->latest('id')
            ->paginate();
      
        return view('livewire.admin.usuarios-index' , compact('usuarios'));
    }
}
