<div class="card">
    @if ($posts->count())
        <div class="card-body">
            <div class="card-header">
                <input wire:model="search" type="text" class="form-control" placeholder="Nombre del post">
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <th scope="row">{{$post->id}}</th>
                            <td>{{$post->nombre}}</td>
                            <td>
                                <a class="btn btn-primary btn-sm" href=""><i class="fas fa-pen"></i></a>
                                <a class="btn btn-danger btn-sm" href=""><i class="fas fa-trash"></i></a>
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
