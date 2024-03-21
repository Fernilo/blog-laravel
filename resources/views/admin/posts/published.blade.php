@extends('adminlte::page')

@section('title', 'Blog Laravel')

@section('content_header')
    <h1>Listado de Posts Publicados</h1>
    <a href="{{route('admin.post.create')}}" class="btn btn-success"><i class="fas fa-plus"></i></a>
@stop



@section('content')
    @if(session('mensaje'))
        <div class="alert-success p-3 mb-3 ">
            <p>{{session('mensaje')}}</p>
        </div>
    @endif
    @livewire('admin.post-index' , ['states' => $states,'status' => 2])
@stop