@extends('adminlte::page')

@section('title', 'Blog Laravel')

@section('content_header')
    <h1>Listado de Posts en Borrador</h1>
    <!-- TODO:Ver de reutilizar esto en otros modulos -->
    <a href="{{route('admin.post.create')}}" class="btn btn-success"><i class="fas fa-plus"></i> Nuevo Post</a>
@stop



@section('content')
    @if(session('mensaje'))
        <div class="alert-success p-3 mb-3 ">
            <p>{{session('mensaje')}}</p>
        </div>
    @endif
    @livewire('admin.post-index' , ['states' => $states , 'status' => 1])
@stop