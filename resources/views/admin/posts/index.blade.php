@extends('adminlte::page')

@section('title', 'Blog Laravel')

@section('content_header')
    <h1>Listado de Post</h1>
    <a href="{{route('admin.post.create')}}" class="btn btn-success"><i class="fas fa-plus"></i></a>
@stop



@section('content')
    @if(session('mensaje'))
    <x-alert type="{{ session('type') }}" :message="session('mensaje')"/>
    @endif
    @livewire('admin.post-index' , ['states' => $states])
@stop