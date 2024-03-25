@extends('adminlte::page')

@section('title', 'Blog Laravel')

@section('content_header')
    <h1>Editar Usuario</h1>
@stop
@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.etiquetas.update' , $usuario) }}" method="POST" autocomplete="off">
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

            <a href="{{route('admin.usuarios.index')}}" class="btn btn-secondary">Cancelar</a>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>

    </div>
</div>
@stop