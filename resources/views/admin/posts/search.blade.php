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
    <div class="card">
        @if ($post)
            <div class="card-body">
                @if(session('info'))
                    <div class="alert-success p-3 mb-3 ">
                        <p>{{session('info')}}</p>
                    </div>
                @endif
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">{{$post->id}}</th>
                            <td>{{$post->nombre}}</td>
                            <td>{{$states[$post->estado]}}</td>
                            <td width=10px>
                                <a class="btn btn-primary btn-sm" href="{{route('admin.post.edit', $post)}}"><i class="fas fa-pen"></i></a>
                            </td>
                            <td>
                                @if(!empty($post->image))
                                    <a class="btn btn-warning btn-sm"  href="{{route('admin.post.download', $post)}}"><i class="fas fa-download"></i></a>
                                @endif
                            </td>
                            <td width=10px>
                                <form action="{{route('admin.post.destroy',$post)}}" method="POST" onsubmit="return confirm('¿Está seguro de eliminar este post?')">
                                    @csrf
                                    @method('delete')

                                    <button class="btn btn-danger btn-sm" type="submit"><i class="fas fa-trash"></i></button>                                    
                                </form>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        @else 
            <div class="card-body">
                No existen posts con el id ingresado
            </div>
        @endif
    </div>
    
@stop