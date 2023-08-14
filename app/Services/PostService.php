<?php 
namespace App\Services;

use App\Models\Post;

class PostService 
{
    public function searchById(int $id)
    {
        $posts = Post::find($id);
    dd($posts);
        return view('admin.posts.index',[compact('posts'),'states' => $this->states]);
    }
}