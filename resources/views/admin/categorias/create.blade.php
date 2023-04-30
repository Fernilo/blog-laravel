@extends('adminlte::page')

@section('title', 'Blog Laravel')

@section('content_header')
    <h1>Nueva Categoria</h1>
@stop
@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('categorias.store') }}" method="POST" autocomplete="off">
        @csrf
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" class="form-control" id="nombre" aria-describedby="codigoHelp">
                
                @error('nombre')
                    <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
            <a href="{{route('categorias.index')}}" class="btn btn-secondary">Cancelar</a>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>

    </div>
</div>
@stop