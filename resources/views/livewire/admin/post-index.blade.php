<div class="card">
    @if ($posts->count())
        <div class="card-body">
            @if(session('info'))
                <div class="alert-success p-3 mb-3 ">
                    <p>{{session('info')}}</p>
                </div>
            @endif
            <div class="card-header">
                <input wire:model="search" type="text" class="form-control" placeholder="Nombre del post">
            </div>
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
                    @foreach ($posts as $post)
                        <tr>
                            <th scope="row">{{$post->id}}</th>
                            <td>{{$post->nombre}}</td>
                            <td>{{$states[$post->estado]}}</td>
                            <td width=10px>
                                <a class="btn btn-primary btn-sm" href="{{route('post.edit', $post)}}"><i class="fas fa-pen"></i></a>
                            </td>
                            <td width=10px>
                                <form action="{{route('post.destroy',$post)}}" method="POST">
                                    @csrf
                                    @method('delete')

                                    <button class="btn btn-danger btn-sm" type="submit"><i class="fas fa-trash"></i></button>                                    
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{$posts->links()}}
        </div>
    @else 
        <div class="card-body">
            No existen posts relacionados
        </div>
    @endif
</div>
