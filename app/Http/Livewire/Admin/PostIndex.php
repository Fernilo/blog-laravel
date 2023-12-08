<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Post;
use Livewire\WithPagination;

class PostIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $search;
    public $states;
    public $status;

    public function updatingSearch() 
    {
        $this->resetPage();//Elimina el parametro get de la paginacion en la URL
    }

    public function render()
    {
        $conditions = [
            ['usuario_id' , auth()->user()->id],
            ['nombre', 'LIKE' ,'%' .$this->search .'%'],
            ['estado', $this->status]
        ];

        $posts = Post::orderBy('nombre')
            ->where($conditions)
            ->paginate();
      
        return view('livewire.admin.post-index' ,compact('posts') , ['states' => $this->states]);
    }
}
