@extends('adminlte::page')

@section('title', 'Blog Laravel')

@section('content_header')
    <h1>Nueva Categoría</h1>
@stop
@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.categorias.store') }}" method="POST" autocomplete="off">
        @csrf
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" class="form-control" id="nombre">
                
                @error('nombre')
                    <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
            <a href="{{route('admin.categorias.index')}}" class="btn btn-secondary">Cancelar</a>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>

    </div>
</div>
@stop