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
use SplFileInfo;
use Illuminate\Support\Facades\DB;

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

    public function searchById(Request $request)
    {
        $posts = $this->postService->searchById($request->input('id'));

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

        if($request->file('imagen')) {
            $url = Storage::put('posts',$request->file('imagen'));

            $post->image()->create([
                'url' => $url
            ]);

            PostSaved::dispatch($post);
        }


        if($request->etiquetas) {
            $post->etiquetas()->attach($request->etiquetas);
        }

        return redirect()->route('admin.post.index')->with(['mensaje' => "Post Creado Correctamente"]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Podriamos usar findOrFail el cual si hay error una exceptcion de error 404
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
         
            PostSaved::dispatch($post);
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
        DB::beginTransaction();
        try {
            $post->delete();

            DB::commit();
            return redirect()->route('admin.post.index')->with(['info' => 'El post ha sido borrado']);
        } catch (\Throwable $th) {
           DB::rollBack();
           $th->getMessage();
        }
       
    }

    /**
     * Descarga de imagenes/archivos
     *
     * @param Post $post
     * @return void
     */
    public function download(Post $post)
    {
        $info = new SplFileInfo($post->image->url);

        return Storage::download($post->image->url,'imagen.'.$info->getExtension());
    }
}
