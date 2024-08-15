<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Traits\LogTrait;

class UsuarioController extends Controller
{
    use LogTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.usuarios.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.usuarios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        User::create($request->all());

        return redirect()->route('admin.usuarios.index')->with(['mensaje' => "Usuario Creado Correctamente"]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $roles = Role::all();

        $usuario = User::with('roles')->find($id);
        return view('admin.usuarios.edit', compact('usuario','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  object $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $usuario)
    {
        $usuario->roles()->sync($request->rol);

        return redirect()->route('admin.usuarios.index')->with([['mensaje' => "Usuario Editado Correctamente"]]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $usuario)
    {
        $userDeleted = $usuario->replicate();
        if($usuario->delete()) {
            $this->writeLog('Usuario borrado: '. $userDeleted->name);
            return redirect()->route('admin.usuarios.index')->with(['mensaje' => 'El usuario ha sido borrada']);
        }
        return redirect()->route('admin.usuarios.index')->with(['error' => 'Error al borrar el usuario , intente nuevamente']);
    }
}
