@if(session()->has('msj'))
  @if(session('msj'))
    <div class="alert alert-success" role="alert">
      <a href="#" class="alert-link">Registro Procesado Correctamente:{{session('msj')}} </a>
    </div>
  @else
    <div class="alert alert-danger" role="alert">
    <a href="#" class="alert-link">Error no se guardo el registro</a>
  </div>
  @endif
@endif

@if (isset($noticia))
<form class="form-horizontal" role="form" method="POST" action="{{ route('noticias.update',$noticia->id)}}" enctype="multipart/form-data">	
<input name="_method" type="hidden" value="PUT">
	{{csrf_field()}}
  <div class="form-group">
    <label for="titulo" class="col-sm-2 control-label">Titulo</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="titulo" placeholder="Titulo" value={{$noticia->titulo}}>
      @if($errors->has('titulo'))
        <span style="color:red">{{$errors->first('titulo')}}</span>
      @endif

    </div>
  </div>
  <div class="form-group">
    <label for="descripcion" class="col-sm-2 control-label">Descripcion</label>
    <div class="col-sm-10">
      <textarea type="text" class="form-control" name="descripcion" placeholder="Descripcion">{{$noticia->titulo}}</textarea>
      @if($errors->has('descripcion'))
          <span style="color:red">{{$errors->first('descripcion')}}</span>
      @endif
      
    </div>
  </div>
  <div class="form-group">
    <label for="urlImg" class="col-sm-2 control-label">Descripcion</label>
    <div class="col-sm-10">
      <input type="file" class="form-control" name="urlImg" >
      <input name="urlvieja" type="hidden" value={{$noticia->urlImg}}>
      <img src="../../imgNoticias/{{$noticia->urlImg}}" alt="{{$noticia->titulo}}" class="img-thumbnail">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-warning">Modificar</button>
    </div>
  </div>
</form>
@endif