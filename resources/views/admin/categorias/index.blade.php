@extends('adminlte::page')

@section('title', 'Blog Laravel')

@section('content_header')
    <h1>Listado de Categorías</h1>
    <a href="{{route('categorias.create')}}" class="btn btn-success"><i class="fas fa-plus"></i></a>
@stop

@section('content')
    @if(session('mensaje'))
        <div class="alert-success p-3 mb-3 ">
            <p>{{session('mensaje')}}</p>
        </div>
    @endif
    @livewire('admin.categoria-index')
@stop