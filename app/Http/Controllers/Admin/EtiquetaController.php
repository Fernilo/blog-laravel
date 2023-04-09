<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Etiqueta;
use Illuminate\Http\Request;
use App\Http\Requests\StoreEtiquetasRequest;


class EtiquetaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $etiquetas = Etiqueta::all();

        return view('admin.etiquetas.index',compact('etiquetas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $colores = [
            'red' => 'red' , 
            'yellow' => 'yellow' , 
            'green' => 'green' , 
            'blue' => 'blue' , 
            'indigo' => 'indigo' , 
            'purple' => 'purple' , 
            'pink' => 'pink' , 
            'brown' => 'brown' ,
            'orange' => 'orange' , 
            'gold'  => 'gold' , 
            'cyan' => 'cyan'
        ];
        return view('admin.etiquetas.create' , compact('colores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEtiquetasRequest $request)
    {
        $etiqueta = Etiqueta::create($request->all());

        return redirect()->route('etiquetas.index')->with(['mensaje' => "Etiqueta Creada Correctamente"]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $etiqueta = Etiqueta::find($id);
        $colores = [
            'red' => 'red' , 
            'yellow' => 'yellow' , 
            'green' => 'green' , 
            'blue' => 'blue' , 
            'indigo' => 'indigo' , 
            'purple' => 'purple' , 
            'pink' => 'pink' , 
            'brown' => 'brown' ,
            'orange' => 'orange' , 
            'gold'  => 'gold' , 
            'cyan' => 'cyan'
        ];
        return view('admin.etiquetas.edit' , compact('colores','etiqueta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreEtiquetasRequest $request , Etiqueta $etiqueta)
    {
        $etiqueta->update($request->all());

        return redirect()->route('etiquetas.index')->with(['mensaje' => "Etiqueta Editada Correctamente"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Etiqueta $etiqueta)
    {
        $etiqueta->delete();

        return redirect()->route('etiquetas.index')->with(['info' => 'La etiqueta ha sido borrada']);
    }
}
