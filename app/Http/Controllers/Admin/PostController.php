<?php

namespace App\Http\Controllers\Admin;

use App\Events\PostSaved;
use App\Http\Controllers\Controller;
use App\Models\Categoria;
use App\Models\Etiqueta;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Requests\StorePostRequest;
use App\Services\PostService;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;

class PostController extends Controller
{
    protected $states = [
        1 => 'Borrador',
        2 => 'Publicado'
    ];

    private $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();//Solo trae los posts del usuario por la validacion en livewire
        return view('admin.posts.index',[compact('posts'),'states' => $this->states]);
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
        
        $url = Storage::put('/public/posts',$request->file('imagen'));

        $post->image()->create([
            'url' => $url
        ]);

        PostSaved::dispatch($post);

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
        $post = Post::with('categoria','etiquetas')->find($id);//Con with precargamos las relaciones y 
        //evitamos nuevas consultas
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
            $url = Storage::put('public/posts', $request->file('imagen'));
            if($post->image) {
                Storage::delete($post->image->url);

                $post->image->update([
                    'url' => $url
                ]);

                //Optimización de img
                $manager = new ImageManager(['driver' => 'imagick']);
                $image = $manager->make(Storage::get($post->image->url))->widen(600)->encode();
                dd($image);

                Storage::put($post->image->url , (string)$image);
            } else {
                $post->image()->create([
                    'url' => $url
                ]);
            }
        }
        if($request->etiquetas) {
            $post->etiquetas()->sync($request->etiquetas);
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
