<div class="form-group">
    <label for="Nombre">Nombre</label>
        <input type="text" class="form-control" name="name" id="name" value="{{ isset($category->Name)?$category->Name:'' }}">
</div>
<div class="form-group">
    <label for="Descripcion">Descripcion</label>
        <input type="text" class="form-control" name="description" id="descripcion" value="{{ isset($category->Name)?$category->Name:'' }}">
</div>
<div class="form-group">
    <label for="pricepurchase">Precio Compra</label>
        <input type="text" class="form-control" name="PricePurchase" id="PricePurchase" value="{{ isset($category->Description)?$category->Description:'' }}">
</div>
<div class="form-group">
    <label for="pricesell">Precio Compra</label>
        <input type="text" class="form-control" name="PriceSell" id="PriceSell" value="{{ isset($category->Description)?$category->Description:'' }}">
</div>

<div class="form-group">
    <label for="category_id">Categoria</label>
    <select name='category_id' v-model='form.category_id' class='form-control'>
    <option value=''>Please choose one...</option>
    @foreach( $categories as $category)
    <option value='{{ $category->id}}'>{{ $category->Name}}</option>
    @endforeach
</select>
</div>
<br/>
<input type="submit" value="Crear Producto" class="btn btn-success">
<a  class="btn btn-primary" href="{{ url('products') }}">Volver a Productos</a>
