<?php

namespace App\Http\Livewire\Admin;

use Spatie\Permission\Models\Role;
use Livewire\Component;
use Livewire\WithPagination;

class RolIndex extends Component
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
        $roles = Role::where('name', 'LIKE' ,'%' .$this->search .'%')
            ->latest('id')
            ->paginate();
      
        return view('livewire.admin.roles-index', compact('roles'));
    }
}
