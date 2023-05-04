<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use App\Models\Etiqueta;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Requests\StorePostRequest;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categoria::select('id' , 'nombre')->get();
        $etiquetas = Etiqueta::all();

        return view('admin.posts.create',compact('categorias','etiquetas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        $post = Post::create($request->all());
        $url = Storage::put('posts',$request->file('imagen'));
   
        $post->image()->create([
            'url' => $url
        ]);

        if($request->etiquetas) {
            $post->etiquetas()->attach($request->etiquetas);
        }

        return redirect()->route('admin.post.index')->with(['mensaje' => "Post Creado Correctamente"]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);

        $etiquetas = Etiqueta::all();
        $categorias = Categoria::select('id' , 'nombre')->get();

        return view('admin.posts.edit',compact('categorias','etiquetas','post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Post $post
     * @return \Illuminate\Http\Response
     */
    public function update(StorePostRequest $request , Post $post)
    {
        $post->update($request->all());
        if($request->file('imagen')) {
            //$request->file('imagen')->store('posts' , 'public');
            $url = Storage::put('posts', $request->file('imagen'));
            if($post->image) {
                Storage::delete($post->image->url);

                $post->image->update([
                    'url' => $url
                ]);
            } else {
                $post->image()->create([
                    'url' => $url
                ]);
            }
        }
        if($request->etiquetas) {
            $post->etiquetas()->attach($request->etiquetas);
        }

        return redirect()->route('admin.post.index')->with(['mensaje' => "Post Editado Correctamente"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('admin.post.index')->with(['info' => 'El post ha sido borrada']);
    }
}
