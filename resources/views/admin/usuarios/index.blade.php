@extends('adminlte::page')

@section('title', 'Blog Laravel')

@section('content_header')
    <h1>Listado de Usuarios</h1>
    <a href="{{route('admin.usuarios.create')}}" class="btn btn-success"><i class="fas fa-plus"></i></a>
@stop



@section('content')
    @if(session('mensaje'))
        <div class="alert-success p-3 mb-3 ">
            <p>{{session('mensaje')}}</p>
        </div>
    @endif
    @livewire('admin.usuarios-index')
@stop