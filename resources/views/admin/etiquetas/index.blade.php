@extends('adminlte::page')

@section('title', 'Blog Laravel')

@section('content_header')
    <h1>Listado de Etiquetas</h1>
    @can('admin.etiquetas.create')
    <a href="{{route('admin.etiquetas.create')}}" class="btn btn-success"><i class="fas fa-plus"></i> Agregar etiqueta</a>
    @endcan
@stop

@section('content')
    @if(session('mensaje'))
        <div class="alert-success p-3 mb-3 ">
            <p>{{session('mensaje')}}</p>
        </div>
    @endif
    @livewire('admin.etiqueta-index')
@stop