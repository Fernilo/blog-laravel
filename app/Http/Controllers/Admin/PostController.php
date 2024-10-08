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
use APP\Traits\PostTrait;
use App\Traits\SaveImagesTrait;
use Illuminate\Support\Facades\Storage;
use SplFileInfo;
use App\Traits\LogTrait;

class PostController extends Controller
{
    use LogTrait;
    use SaveImagesTrait;

    protected $states = [
        1 => 'Borrador',
        2 => 'Publicado'
    ];

    private $postService;

    // Patron de diseño inyección de dependencias
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
        return view('admin.posts.index',['states' => $this->states]);
    }

    public function drafts()
    {
        return view('admin.posts.drafts',['states' => $this->states]);
    }

    public function published() 
    {
        return view('admin.posts.published',['states' => $this->states]);
    }

    public function searchById(Request $request)
    {
        $post = $this->postService->searchById($request->input('id'));

        return view('admin.posts.search',['post' => $post ,'states' => $this->states]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        session()->put('previousUrl' , url()->previous());

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
           $this->SaveImages($request, $post);
        }

        if($request->etiquetas) {
            $post->etiquetas()->attach($request->etiquetas);
        }

        return redirect($request->session()->get('previousUrl'))->with(['mensaje' => "Post Creado Correctamente"]);

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

        //Implementamos policies para impedir que editen posts de otros usuarios
        $this->authorize('author', $post);

        session()->put('previousUrl' , url()->previous());
     
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
        //Implementamos policies para impedir que editen posts de otros usuarios
        $this->authorize('author', $post);

        $post->update($request->all());

        if($request->file('imagen')) {
            $this->SaveImages($request, $post);
        }

        if($request->etiquetas) {
            $post->etiquetas()->sync($request->etiquetas);
        }
       
        return redirect($request->session()->get('previousUrl'))->with(['mensaje' => "Post Editado Correctamente"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy(Post $post)
    // {
    //     //Implementamos policies para impedir que editen posts de otros usuarios
    //     $this->authorize('author', $post);
        
    //     DB::beginTransaction();
    //     try {
    //         $post->delete();

    //         DB::commit();
    //         return redirect(url()->previous())->with(['info' => 'El post ha sido borrado']);
    //     } catch (\Throwable $th) {
    //        DB::rollBack();
    //        $th->getMessage();
    //     }
       
    // }

    public function destroy (Post $post) 
    {
        $postDeleted = $post->replicate();
        if($post->delete()) {
            $this->writeLog('Post borrado: '. $postDeleted->name);
            return redirect()->route('admin.post.index')->with(['mensaje' => 'El post ha sido borrada', 'type' => 'success']);
        }
        return redirect()->route('admin.post.index')->with(['error' => 'Error al borrar el post , intente nuevamente', 'type' => 'error']);
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
