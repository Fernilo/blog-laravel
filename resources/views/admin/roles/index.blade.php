@extends('adminlte::page')

@section('title', 'Blog Laravel')

@section('content_header')
    <h1>Listado de Roles</h1>
    {{-- @can('admin.roles.create') --}}
    <a href="{{route('admin.roles.create')}}" class="btn btn-success"><i class="fas fa-plus"></i> Agregar rol</a>
    {{-- @endcan --}}
@stop

@section('content')
    @if(session('mensaje'))
        <div class="alert-success p-3 mb-3 ">
            <p>{{session('mensaje')}}</p>
        </div>
    @endif
    @livewire('admin.rol-index')
@stop