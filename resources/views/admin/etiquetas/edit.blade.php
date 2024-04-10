@extends('adminlte::page')

@section('title', 'Blog Laravel')

@section('content_header')
    <h1>Editar Etiqueta</h1>
@stop
@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.etiquetas.update' , $etiqueta) }}" method="POST" autocomplete="off">
        @method('patch')
        @csrf
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" value="{{$etiqueta->nombre}}" class="form-control" id="nombre" aria-describedby="codigoHelp">
                
                @error('nombre')
                    <small class="text-danger">{{$message}}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="color">Color</label>
                <select name="color" class="form-control" id="">
                    @foreach ($colores as $color)
                        <option value="{{$color}}" @if ($color == $etiqueta->color) selected @endif>{{$color}}</option>
                    @endforeach
                </select>                
            </div>

            <a href="{{route('admin.etiquetas.index')}}" class="btn btn-secondary">Cancelar</a>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>

    </div>
</div>
@stop