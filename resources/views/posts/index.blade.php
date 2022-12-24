@extends('layouts.public')

@section('contenidoPrincipal')
<div class="row">
    @foreach ($posts as $post)
    <div class="col-12 col-md-4  @if($loop->first) col-md-8 @endif">
        @include('partials.card-post')
    </div>
    @endforeach

    <div class="mt-4 d-flex justify-content-end">
        {{ $posts->links() }}
    </div>
</div>

@endsection