<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Etiqueta;
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
        ->paginate(4);

        return view('posts.categoria' , compact('posts','categoria'));
    }

    public function etiqueta(Etiqueta $etiqueta) 
    {
        $posts = $etiqueta->posts()->where('estado' , 2)->latest('id')->paginate(4);
        return  view('posts.etiqueta', compact('posts','etiqueta'));
    }

    public function buscador(Request $request)
    {
        $posts = Post::where([
            ['nombre' , 'like' ,$request->texto."%"],
            ['estado' , 2]
        ])
        ->take(10)
        ->get();

        return view("partials.buscador" , compact('posts'));
    }
}
