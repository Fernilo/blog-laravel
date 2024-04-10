@extends('adminlte::page')

@section('title', 'Blog Laravel')

@section('content_header')
    <h1>Editar Usuario</h1>
@stop
@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.usuarios.update' , $usuario) }}" method="POST" autocomplete="off">
        @method('patch')
        @csrf
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" value="{{ $usuario->name }}" value="{{$usuario->nombre}}" class="form-control" id="nombre" aria-describedby="codigoHelp">
                
                @error('nombre')
                    <small class="text-danger">{{$message}}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" value="{{ $usuario->email }}" name="email" class="form-control" id="email" aria-describedby="codigoHelp">             
            </div>

            <div class="form-group">
                <label for="rol">Rol</label>
                <select name="rol" required class="form-control" id="">
                    <option value=""></option>
                    @foreach ($roles as $rol)
                        <option @if (isset($usuario->roles[0]->name) && $rol->name === $usuario->roles[0]->name) selected @endif value="{{$rol->id}}">{{$rol->name}}</option>
                    @endforeach
                </select>
            
                @error('etiquetas')
                    <small class="text-danger">{{$message}}</small>
                @enderror
            </div>

            <a href="{{route('admin.usuarios.index')}}" class="btn btn-secondary">Cancelar</a>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>

    </div>
</div>
@stop