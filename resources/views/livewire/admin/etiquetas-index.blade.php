<div class="card">
    @if ($etiquetas->count())
        <div class="card-body">
            @if(session('info'))
                <div class="alert-success p-3 mb-3 ">
                    <p>{{session('info')}}</p>
                </div>
            @endif
            <div class="card-header">
                <input wire:model="search" type="text" class="form-control" placeholder="Nombre de la etiqueta">
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Color</th>
                    <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($etiquetas as $etiqueta)
                        <tr>
                            <th scope="row">{{$etiqueta->id}}</th>
                            <td>{{$etiqueta->nombre}}</td>
                            <td>{{$etiqueta->color}}</td>
                            <td width=10px>
                                @can('admin.etiquetas.edit')
                                <a class="btn btn-primary btn-sm" href="{{route('admin.etiquetas.edit' , $etiqueta)}}"><i class="fas fa-pen"></i></a>
                                @endcan
                            </td>
                            <td width=10px>
                                @can('admin.etiquetas.destroy')
                                <form action="{{route('admin.etiquetas.destroy',$etiqueta)}}" method="POST">
                                    @csrf
                                    @method('delete')

                                    <button class="btn btn-danger btn-sm" type="submit"><i class="fas fa-trash"></i></button>                                    
                                </form>
                                @endcan
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
