@extends('adminlte::page')

@section('title', 'Blog Laravel')

@section('content_header')
    <h1>Listado de Usuarios</h1>
    <a href="{{route('admin.usuarios.create')}}" class="btn btn-success"><i class="fas fa-plus"></i> Agregar Usuario</a>
@stop



@section('content')
    @if(session('mensaje'))
    <x-alert type="{{ session('type') }}" :message="session('mensaje')"/>
    @endif
    @livewire('admin.usuarios-index')
@stop