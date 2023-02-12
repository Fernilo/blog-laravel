@extends('adminlte::page')

@section('title', 'Blog Laravel')

@section('content_header')
    <h1>Nuevo Post</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('post.store') }}" method="POST" autocomplete="off">
        @csrf
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" class="form-control" id="nombre" aria-describedby="codigoHelp">
            </div>
            <div class="form-group">
                <label for="descripcion">Descripción</label>
                <input type="text" name="descripcion" class="form-control" id="descripcion" aria-describedby="descripcionHelp">
            </div>
            <div class="form-group">
                <label for="cuerpo">Cuerpo</label>
                <textarea name="cuerpo" class="form-control" id="cuerpo" cols="30" rows="10"></textarea>
            </div>
            <div class="form-group">
                <label for="categoria_id">Categoría</label>
                <select name="categoria_id" class="form-control" id="" required>
                    <option value="">Seleccione Categoría</option>
                    @foreach ($categorias as $categoria)
                        <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="etiquetas[]">Categoría</label>
                <select multiple name="etiquetas[]" class="form-control" id="" required>
                    @foreach ($etiquetas as $etiqueta)
                        <option value="{{$etiqueta->id}}">{{$etiqueta->nombre}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <div class="form-check">
                    <input class="form-check-input" value="2" type="radio" name="estado" id="estado">
                    <label class="form-check-label" for="publicado">
                        Publicado
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" value="1" type="radio" name="estado" id="estado" checked>
                    <label class="form-check-label" for="borrador">
                        Borrador
                    </label>
                </div>
            </div>
            <a href="/articulos" class="btn btn-secondary">Cancelar</a>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>

    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop