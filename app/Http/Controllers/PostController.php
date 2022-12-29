<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::where('estado' , 2)->latest('id')->paginate(8);//nos devuelve una colección
        return view('posts.index' , compact('posts'));
    }

    public function show(Post $post) 
    {
        $postsRelacionados = Post::where([
                ['categoria_id' , $post->categoria_id], 
                ['estado' , 2],
                ['id' , '!=' , $post->id]
            ])
            ->latest('id')
            ->take(4)
            ->get();

        return view('posts.show', compact('post' , 'postsRelacionados'));
    }

    public function categoria(Categoria $categoria)
    {
        $posts = Post::where([
            ['categoria_id' , $categoria->id], 
            ['estado' , 2]
        ])
        ->latest('id')
        ->paginate(6);

        return view('posts.categoria' , compact('posts','categoria'));
    }
}
