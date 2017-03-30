<table class="table table-hover">
	<thead>
		<tr>
			<th>Titulo</th>
			<th>Descripcion</th>
			<th>Imagen</th>
			<th><br></th>
		</tr>
	</thead>
	<tbody>
	@if(isset($noticias))
		@foreach($noticias as $n)
		<tr>
			<td>{{$n->titulo}}</td>
			<td>{{$n->descripcion}}</td>
			<td>
				<img src="imgNoticias/{{$n->urlImg}}" alt="{{$n->titulo}}" class="img-thumbnail">
			</td>
			<td> 
				<a href="noticias/{{$n->id}}/edit" class="btn btn-warning bnt-xs">Modificar</a> 
				<a href="noticias/{{$n->id}}" class="btn btn-danger bnt-xs">Borrar</a>
			</td>
		</tr>
		@endforeach
	@endif	
	</tbody>
</table>
{{$noticias->render()}}