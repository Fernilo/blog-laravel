@if (count($posts))
    @foreach ($posts as $post)
        <p class="p-2 border-bottom"> <a href="{{ route('post.show' , $post)}}" class="link-dark">{{ $post->nombre }}</a></p>
    @endforeach
@endif