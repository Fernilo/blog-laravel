@extends('layouts.public')

@section('contenidoPrincipal')
<div class="row">
    <div class="col-12">
        <h1 class="text-center text-uppercase mt-2">Etiqueta:{{$etiqueta->nombre}}</h1>
    </div>
    
    @foreach ($posts as $post)
        <div class="col-12 col-sm-10 mx-auto rounded">
            <x-cards :post="$post"/>
        </div>
    @endforeach

    <div class="mt-4 d-flex justify-content-end">
        {{ $posts->links() }}
    </div>
</div>

@endsection