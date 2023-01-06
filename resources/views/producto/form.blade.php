<h2>Crear Formulario</h2>
<div class="mb-3">
    <label for="" class="form-label">Codigo</label>
    <input id="codigo" name="codigo" type="text" class="form-control" tabindex="1" value="{{isset($producto->codigo)?$producto->codigo:''}}">
</div>
<div class="mb-3">
    <label for="formFileSm" class="form-label">Foto</label>
    @if (isset($producto->foto))
    <img src="{{asset('storage').'/'.$producto->foto}}" width="80" alt="">
    @endif
    <input class="form-control form-control-sm" name="foto" id="foto" type="file">
</div>
<div class="mb-3">
    <label for="" class="form-label">Descripcion</label>
    <input id="descripcion" name="descripcion" type="text" class="form-control" tabindex="2" value="{{isset($producto->descripcion)?$producto->descripcion:''}}">
</div>
<div class="mb-3">
    <label for="" class="form-label">Cantidad</label>
    <input id="cantidad" name="cantidad" type="number" class="form-control" tabindex="3" value="{{isset($producto->cantidad)?$producto->cantidad:''}}">
</div>
<div class="mb-3">
    <label for="" class="form-label">Precio</label>
    <input id="precio" name="precio" type="number" step="any"  class="form-control" tabindex="4" value="{{isset($producto->precio)?$producto->precio:'0.00'}}">
</div>
<a href="{{ url('/productos')}}" class="btn btn-secondary" tabindex="5">Cancelar</a>
<button type="submit" class="btn btn-primary" tabindex="6">Guardar</button>
