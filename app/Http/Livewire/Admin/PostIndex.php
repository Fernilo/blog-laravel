<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Post;
use Livewire\WithPagination;

class PostIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";
    
    public function render()
    {
        $posts = Post::where('usuario_id' , auth()->user()->id)->latest('id')->paginate();
      
        return view('livewire.admin.post-index' , compact('posts'));
    }
}
