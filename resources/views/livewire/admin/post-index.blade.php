<div class="card">
    <div class="card-body">
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
                            <a class="btn btn-primary btn-sm" href="">Editar</a>
                        </td>
                    </tr>
                @endforeach
              </tbody>
        </table>
    </div>
    <div class="card-footer">
        {{$posts->links()}}
    </div>
</div>
