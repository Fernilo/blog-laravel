@extends('layouts.public')

@section('contenidoPrincipal')
<div class="row mt-3">
    <div class="col-12">
        <h1>{{ $post->nombre }}</h1>
        <div class="mt-3">
            {{ $post->descripcion }}
        </div>

    </div>
    
    <div  class="col-sm-8 mt-2">
        <figure style="height:400px;">
            <img class="w-100 h-100 img-fluid" src="{{ Storage::url($post->image->url) }}" alt="">
        </figure>

        <div class="fs-6 fw-light lh-base">
            {{ $post->cuerpo }}
        </div>
    </div>

    <div class="col-sm-4">
        <aside>
            <h3 class="text-center fw-bolder mb-3 mt-3">Más en {{ $post->categoria->nombre }}</h3>

            @foreach ($postsRelacionados as $postRelacionado)
                @include('partials.card-post', ['post' => $postRelacionado])
            @endforeach
        </aside>
    </div>
</div>

@endsection