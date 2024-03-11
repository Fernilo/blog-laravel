@if (count($posts))
    @foreach ($posts as $post)
        <p class="p-2 border-bottom"> <a href="{{ route('post.show' , $post)}}" class="link-buscador text-dark text-decoration-none">{{ $post->nombre }}</a></p>
    @endforeach
@endif