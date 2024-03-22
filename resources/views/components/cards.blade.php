@props(['post'])
<div class="card border-light text-white fw-bolder p-1 m-2 text-center shadow p-1 mb-5 bg-body rounded" style="height: 400px;">
    <img class="card-img img-fluid h-100" src="@if($post->image) {{ Storage::url($post->image->url) }} @else https://cdn.pixabay.com/photo/2023/01/30/18/56/island-7756423__340.jpg @endif" alt="Card image">
    <div class="card-img-overlay">
        @foreach ($post->etiquetas as $etiqueta)
            <div class="px-3 text-secondary badge" style="background-color: {{ $etiqueta->color }}">
                <a style="text-decoration: none;" class="link-secondary" href="{{ route('post.etiqueta' , $etiqueta) }}}">{{ $etiqueta->nombre }}</a>
            </div>
        @endforeach
        <div class="mt-5">
            <h5 class="card-title"><a href="{{ route('post.show' , $post)}}" class="text-white">{{ $post->nombre }}</a></h5>
            <p class="card-text">{{ $post->descripcion }}</p>
        </div>
    </div>
</div>