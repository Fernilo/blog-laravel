<?php 
namespace App\Services;

use App\Models\Post;

class PostService 
{
    public function searchById(int $id)
    {
        $post = Post::find($id);
 
        return $post;
    }
}