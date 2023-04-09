@extends('adminlte::page')

@section('title', 'Blog Laravel')

@section('content_header')
    <h1>Nueva Etiqueta</h1>
@stop
@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('etiquetas.store') }}" method="POST" autocomplete="off">
        @csrf
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" class="form-control" id="nombre" aria-describedby="codigoHelp">
                
                @error('nombre')
                    <small class="text-danger">{{$message}}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="nombre">Color</label>
                <select name="color" class="form-control" id="">
                    @foreach ($colores as $color)
                        <option value="{{$color}}">{{$color}}</option>
                    @endforeach
                </select>                
                
                @error('nombre')
                    <small class="text-danger">{{$message}}</small>
                @enderror
            </div>

            <a href="{{route('etiquetas.index')}}" class="btn btn-secondary">Cancelar</a>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>

    </div>
</div>
@stop