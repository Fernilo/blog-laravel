@extends('adminlte::page')

@section('title', 'Blog Laravel')

@section('content_header')
    <h1>Nuevo Post</h1>
@stop
@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('post.store') }}" method="POST" autocomplete="off" enctype="multipart/form-data">
        @csrf
            @include('admin.posts.partials.form')

            <a href="{{route('admin.post.index')}}" class="btn btn-secondary">Cancelar</a>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>

    </div>
</div>
<script>
    const fileSelector = document.getElementById("imagen-file")
    fileSelector.addEventListener('change' , cambiarImagen)

    function cambiarImagen(event) {
       
        var file = event.currentTarget.files[0];

        var reader = new FileReader();
        reader.onload = (event) => {
            document.getElementById("imagen-post").setAttribute('src' , event.target.result);
        }

        reader.readAsDataURL(file);
    }
</script>
@stop