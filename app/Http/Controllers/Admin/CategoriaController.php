<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use App\Traits\LogTrait;
use App\Http\Requests\StoreCategoriasRequest;

class CategoriaController extends Controller
{
    use LogTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.categorias.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categorias.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoriasRequest $request)
    {
        Categoria::create($request->all());
        
        return redirect()->route('admin.categorias.index')->with(["mensaje" => 'Categoría creada correctamente']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categoria = Categoria::find($id);

        return view('admin.categorias.edit' , compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCategoriasRequest $request,Categoria $categoria)
    {
        $categoria->update($request->all());

        return redirect()->route('admin.categorias.index')->with(['mensaje' => 'Categoria editada correctamente']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categoria $categoria)
    {
        $categoryDeleted = $categoria->replicate();
        
        if($categoria->delete()) {
        
            $this->writeLog('Categoria borrada: '. $categoryDeleted->nombre);
            return redirect()->route('admin.categorias.index')->with(['mensaje' => 'la categoría ha sido borrada', 'type' => 'success']);
        }
        return redirect()->route('admin.categorias.index')->with(['mensaje' => 'Error, intente nuevamente', 'type' => 'error']);
    }
}
