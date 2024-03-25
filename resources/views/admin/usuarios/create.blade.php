@extends('adminlte::page')

@section('title', 'Blog Laravel')

@section('content_header')
    <h1>Nuevo Usuario</h1>
@stop
@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.usuarios.store') }}" method="POST" autocomplete="off">
        @csrf
            <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" name="name" class="form-control" id="name" aria-describedby="codigoHelp">
                
                @error('name')
                    <small class="text-danger">{{$message}}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" id="email" aria-describedby="codigoHelp">              
                
                @error('email')
                    <small class="text-danger">{{$message}}</small>
                @enderror
            </div>

            <a href="{{route('admin.usuarios.index')}}" class="btn btn-secondary">Cancelar</a>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>

    </div>
</div>
@stop