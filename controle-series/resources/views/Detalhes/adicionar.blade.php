@extends('layout')
	@section('conteudo')
	
<div class="container">
	<div class="row">
	<div class="col-sm-2">
	</div>
	<div class="col-sm-6">
  <h2>Cadastrar detalhes Serie {{$serieNome}}</h2>        
	<form method="post" action="/Series/{{$serieId}}/detalhes">
	@csrf
            <div>
		<label for="temporada">Temporadas:</label>
                <input type="text"  id="temporada" name="temporada">	
            </div>
            <div>
		<label  for="ano">Ano: </label>
                <input type="text" id="ano" name="ano">
            </div>
            <div>
		<label  for="duracao">Duração </label>
                <input type="text" id="duracao" name="duracao">
            </div>
            <div>
		<label  for="idioma">Idioma </label>
                <input type="text" id="idioma" name="idioma">
            </div>
            <div>
		<label  for="legenda">Legenda </label>
                <input type="text" id="legenda" name="legenda">
            </div>
            <div>
		<label  for="local">Local </label>
                <input type="text" id="local" name="local">
            </div>
            <div>
		<label  for="comentario">Comentario </label>
                <input type="text" id="comentario" name="comentario">
            </div>
		<button class="btn btn-primary mt-2">Adicionar</button>
	</form>
  </div>
  <div class="col-sm-2">
	</div>
  </div>
</div>
   @endsection