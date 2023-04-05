<div class="card">
    @if ($etiquetas->count())
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
                    <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($etiquetas as $etiqueta)
                        <tr>
                            <th scope="row">{{$etiqueta->id}}</th>
                            <td>{{$etiqueta->nombre}}</td>
                            <td width=10px>
                                <a class="btn btn-primary btn-sm" href=""><i class="fas fa-pen"></i></a>
                            </td>
                            <td width=10px>
                                <form action="{{route('etiquetas.destroy',$etiqueta)}}" method="POST">
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
            {{$etiquetas->links()}}
        </div>
    @else 
        <div class="card-body">
            No existen etiquetas relacionados
        </div>
    @endif
</div>
