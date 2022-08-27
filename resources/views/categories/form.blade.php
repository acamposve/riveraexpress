<div class="form-group">
<label for="Nombre">Nombre</label>
        <input type="text" class="form-control" name="name" id="name" value="{{ isset($category->Name)?$category->Name:'' }}">
        <br/>
</div>
<div class="form-group">
<label for="Descripcion">Descripcion</label>
        <input type="text" class="form-control" name="description" id="description" value="{{ isset($category->Description)?$category->Description:'' }}">
        <br/>
        </div>
<input type="submit" value="Crear Categoria" class="btn btn-success">
<a  class="btn btn-primary" href="{{ url('categories') }}">Volver a Categoria</a>
