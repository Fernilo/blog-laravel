<div class="form-group">
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" class="form-control" required value="{{$post->nombre?? old('nombre')}}" id="nombre" aria-describedby="codigoHelp">
    
    @error('nombre')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>

<div class="row mb-3">
    <div class="col">
        @isset($post->image)
            <img class="img-fluid" src="{{Storage::url($post->image->url)}}" alt="">
        @else
            <img id="imagen-post" class="img-fluid" src="https://cdn.pixabay.com/photo/2023/01/30/18/56/island-7756423__340.jpg" alt="">
        @endisset
    </div>
    <div class="col">
        <div class="form-group">
            <input name="imagen" accept="image/*" type="file" class="form-control" id="imagen-file">

            @error('imagen')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
    </div>
</div>

<div class="form-group">
    <label for="descripcion">Descripción</label>
    <input type="text" name="descripcion" value="{{$post->descripcion?? old('descripcion')}}" class="form-control" id="descripcion" aria-describedby="descripcionHelp">
    
    @error('descripcion')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>

<div class="form-group">
    <label for="cuerpo">Cuerpo</label>
    <textarea name="cuerpo" class="form-control" id="cuerpo" cols="30" rows="10">{{$post->cuerpo?? old('cuerpo')}}</textarea>
    
    @error('cuerpo')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>

<div class="form-group">
    <label for="categoria_id">Categoría</label>
    <select name="categoria_id" class="form-control" id="">
        <option value="">Seleccione Categoría</option>
     
        @foreach ($categorias as $categoria)
            <?php if(isset($post)): ?>
                <option value="{{$categoria->id}}" <?= ($post->categoria_id === $categoria->id)? 'selected' : '' ?>>{{$categoria->nombre}}</option>
            <?php else: ?>
                <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
            <?php endif; ?>
        @endforeach
        @error('categoria_id')
            <small class="text-danger">{{$message}}</small>
        @enderror
    </select>
    
    @error('categoria_id')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>

<div class="form-group">
    <label for="etiquetas[]">Etiquetas</label>
    <select multiple name="etiquetas[]" class="form-control" id="">
        @foreach ($etiquetas as $etiqueta)
            <option value="{{$etiqueta->id}}">{{$etiqueta->nombre}}</option>
        @endforeach
    </select>

    @error('etiquetas')
        <small class="text-danger">{{$message}}</small>
    @enderror
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

    @error('estado')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>