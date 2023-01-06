
<h1>{{$modo}}</h1>

@if (count($errors)>0)
<ul>
    @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
    @endforeach
</ul>
@endif
<label for="usuario_id">Usuario</label>
    <br> <input type="number" min="0" name="usuario_id" id="usuario_id" required value="{{isset ($file->usuario_id)?$file->usuario_id:''}}"> <br>

<br><label for="empresa_id">Empresa</label>
    <br> <input type="number" min="0" name="empresa_id" id="empresa_id" required value="{{isset ($file->empresa_id)?$file->empresa_id:''}}"> <br>

<br><label for="categoria_id">Categoria</label>
    <br> <input type="number" min="0" name="categoria_id" id="categoria_id" required value="{{isset ($file->categoria_id)?$file->categoria_id:''}}"> <br>

<br><label for="tipo">Tipo</label>
    <br> <select required type="text" name="tipo" id="tipo" value="{{isset ($file->tipo)?$file->tipo:''}}">
         <option value="">Que archivo es</option>
         <option value="video">Video</option>
         <option value="Foto">Foto</option>
         </select> <br>
<br><label for="nombre">Nombre</label>
    <br> <input type="text" name="nombre" id="nombre" required value="{{isset ($file->nombre)?$file->nombre:''}}"> <br>

<br><label for="url">Archivo</label>
@if(isset($file->url))
<video controls width="200" controlslist="nodownload">
    <source src="{{asset('storage').'/'.$file->url}}" alt="" type="video/mp4">
</video>

@endif

    <br> <input type="file" name="url" id="url"  value=""> <br>

<br><label for="alt">Alternativo</label>
    <br> <input type="file" name="alt" id="alt"   value="{{isset ($file->alt)?$file->alt:''}}"> <br>

<br><label for="active">activo</label>
    <br> <input type="text" name="active" id="active"  required value="{{isset ($file->active)?$file->active:''}}"> <br>
<br><input type="submit" value="{{$modo}} datos">
<a href="{{url('file')}}">Regresar</a>