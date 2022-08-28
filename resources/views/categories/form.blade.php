
<div class="input-group input-group-outline mb-3">
    <div class="col-md-3"><label class="form-label" for="Nombre">Nombre</label></div>
    <div class="col-md-9"><input type="text" class="form-control" name="name" id="name" value="{{ isset($category->Name)?$category->Name:'' }}"></div>
</div>
<div class="input-group input-group-outline mb-3">
    <div class="col-md-3"><label for="Descripcion">Descripcion</label></div>
    <div class="col-md-9"><input type="text" class="form-control" name="description" id="description" value="{{ isset($category->Description)?$category->Description:'' }}"></div>
</div>
<input type="submit" value="Crear Categoria" class="btn btn-success">
<a  class="btn btn-primary" href="{{ url('categories') }}">Volver a Categoria</a>
