@extends('adminlte::page')

@section('title', 'Blog Laravel')

@section('content_header')
    <h1>Listado de Categorías</h1>
    @can('admin.categorias.create')
    <a href="{{route('admin.categorias.create')}}" class="btn btn-success"><i class="fas fa-plus"></i> Agregar Categoría</a>
    @endcan
@stop

@section('content')
    @if(session('mensaje'))
        <div class="alert-success p-3 mb-3 ">
            <p>{{session('mensaje')}}</p>
        </div>
    @endif
    @livewire('admin.categoria-index')
@stop