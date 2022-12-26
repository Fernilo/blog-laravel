@extends('layouts.public')

@section('contenidoPrincipal')
<div class="row">
    <div class="col-12">
        <h1 class="text-center text-uppercase mt-2">Categoría:{{$categoria->nombre}}</h1>
    </div>
    @foreach ($posts as $post)
        <div class="col-12 col-md-10">
            @include('partials.card-post')
        </div>
    @endforeach

    <div class="mt-4 d-flex justify-content-end">
        {{ $posts->links() }}
    </div>
</div>

@endsection