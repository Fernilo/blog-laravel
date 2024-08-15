<div class="card">
    @if ($usuarios->count())
        <div class="card-body">
            <div class="card-header">
                <input wire:model="search" type="text" class="form-control" placeholder="Nombre de la etiqueta">
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Email</th>
                    <th scope="col">Rol</th>
                    <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($usuarios as $usuario)
                        <tr>
                            <th scope="row">{{$usuario->id}}</th>
                            <td>{{$usuario->name}}</td>
                            <td>{{$usuario->email}}</td>
                            <td>{{isset($usuario->roles[0]->name)?  $usuario->roles[0]->name : ''}}</td>
                            <td width=10px>
                                <a class="btn btn-primary btn-sm" href="{{route('admin.usuarios.edit' , $usuario)}}"><i class="fas fa-pen"></i></a>
                            </td>
                            <td width=10px>
                                <form action="{{route('admin.usuarios.destroy',$usuario)}}" method="POST">
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
            {{$usuarios->links()}}
        </div>
    @else 
        <div class="card-body">
            No existen usuarios relacionados
        </div>
    @endif
</div>
