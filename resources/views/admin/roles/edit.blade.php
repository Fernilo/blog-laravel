@extends('adminlte::page')

@section('title', 'Blog Laravel')

@section('content_header')
    <h1>Editar Rol</h1>
@stop
@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.roles.update', $rol) }}" method="POST" autocomplete="off">
        @method('patch')
        @csrf
            <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" name="name" value="{{ $rol->name }}" class="form-control" id="name">
                
                @error('name')
                    <small class="text-danger">{{$message}}</small>
                @enderror
            </div>

            <h2>Lista de Permisos</h2>
            @foreach ($permissions as $permission)
                <div>
                    <label for=""><input type="checkbox" class="mr-2" name="" id="{{$permission->id}}">{{$permission->description}}</label>
                </div>
            @endforeach

            <a href="{{route('admin.roles.index')}}" class="btn btn-secondary">Cancelar</a>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>

    </div>
</div>
@stop