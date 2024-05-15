<div class="card">
    @if ($roles->count())
        <div class="card-body">
            @if(session('info'))
                <div class="alert-success p-3 mb-3 ">
                    <p>{{session('info')}}</p>
                </div>
            @endif
            <div class="card-header">
                <input wire:model="search" type="text" class="form-control" placeholder="Nombre del rol">
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
                    @foreach ($roles as $rol)
                        <tr>
                            <th scope="row">{{$rol->id}}</th>
                            <td>{{$rol->name}}</td>
                            <td width=10px>
                                @can('admin.roles.edit')
                                <a class="btn btn-primary btn-sm" href="{{route('admin.roles.edit' , $rol)}}"><i class="fas fa-pen"></i></a>
                                @endcan
                            </td>
                            <td width=10px>
                                @can('admin.roles.destroy')
                                <form action="{{route('admin.roles.destroy',$rol)}}" method="POST">
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
            {{$roles->links()}}
        </div>
    @else 
        <div class="card-body">
            No existen roles relacionados
        </div>
    @endif
</div>
