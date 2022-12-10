<div class="input-group input-group-outline mb-3">
    <div class="col-md-3"><label class="form-label" for="Nombre">Nombre</label></div>
    <div class="col-md-9"><input type="text" class="form-control" name="name" id="name"
            value="{{ isset($client->Name) ? $client->Name : '' }}"></div>
</div>
<div class="input-group input-group-outline mb-3">
    <div class="col-md-3"><label for="Descripcion">NickName</label></div>
    <div class="col-md-9"><input type="text" class="form-control" name="nickname" id="nickname"
            value="{{ isset($client->NickName) ? $client->NickName : '' }}"></div>
</div>
<div class="input-group input-group-outline mb-3">
    <div class="col-md-3"><label for="Contact">Contacto</label></div>
    <div class="col-md-9"><input type="text" class="form-control" name="contact" id="contact"
            value="{{ isset($client->Contact) ? $client->Contact : '' }}"></div>
</div>
<input type="submit" value="Crear Cliente" class="btn btn-success">
<a class="btn btn-primary" href="{{ url('clients') }}">Volver a Clientes</a>
