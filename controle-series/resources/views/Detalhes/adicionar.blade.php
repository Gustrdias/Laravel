@extends('layout')
	@section('conteudo')
	
<div class="container">
	<div class="row">
	<div class="col-sm-2">
	</div>
	<div class="col-sm-6">
  <h2>Cadastrar Series</h2>        
	<form method="post" action="/Series">
	@csrf
		<div class="input-group">
			<label for="nomeSerie">Nome:</label>
			<input type="text"  id="nome" name="nome"><br>
			<label  for="genero">Genero: </label>
			<select id="genero" name="genero">
				<option value="acao">Ação</option>
				<option value="comedia">Comédia</option>
				<option value="drama">Drama</option>
				<option value="aventura">Aventura</option>
				<option value="terror">Terror</option>
				<option value="cientifico">Ciêntifico</option>
				<option value="romance">Romance</option>
				<option value="suspence">Suspence</option>
				<option value="musical">Musical</option>
			</select>
			</div>
			<div>
				<label  for="idioma">idioma </label>
				<input type="text" id="idioma" name="idioma">
			</div>
			<div>
				<label  for="temporada">temporada </label>
				<input type="text" id="temporada" name="temporada">
			</div>
			<div>
				<label  for="duracao">duracao </label>
				<input type="text" id="duracao" name="duracao">
			</div>
			<div>
				<label  for="legenda">legenda </label>
				<input type="text" id="legenda" name="legenda">
			</div>
			<div>
				<label  for="episodios">episodios </label>
				<input type="text" id="" name="episodios">
			</div>
			<div>
				<label  for="comentario">comentario </label>
				<input type="text" id="comentario" name="comentario">
			</div>
			<div>
				<label  for="avaliacao">avaliacao </label>
				<input type="text" id="avaliacao" name="avaliacao">
			</div>
			<div>
				<label  for="ano">ano </label>
				<input type="text" id="ano" name="ano">
			</div>
		<button class="btn btn-primary mt-2">Adicionar</button>
	</form>
  </div>
  <div class="col-sm-2">
	</div>
  </div>
</div>
   @endsection