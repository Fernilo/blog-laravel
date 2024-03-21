<div class="card">
    @if ($categorias->count())
        <div class="card-body">
            @if(session('info'))
                <div class="alert-success p-3 mb-3 ">
                    <p>{{session('info')}}</p>
                </div>
            @endif
            <div class="card-header">
                <input wire:model="search" type="text" class="form-control" placeholder="Nombre de la categoría">
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
                    @foreach ($categorias as $categoria)
                        <tr>
                            <th scope="row">{{$categoria->id}}</th>
                            <td>{{$categoria->nombre}}</td>
                            <td width=10px>
                                <a class="btn btn-primary btn-sm" href="{{route('admin.categorias.edit' , $categoria)}}"><i class="fas fa-pen"></i></a>
                            </td>
                            <td width=10px>
                                <form action="{{route('admin.categorias.destroy',$categoria)}}" method="POST">
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
            {{$categorias->links()}}
        </div>
    @else 
        <div class="card-body">
            No existen categorias relacionadas
        </div>
    @endif
</div>
