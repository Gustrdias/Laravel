@extends('layout')
	@section('conteudo')
	
<div class="container">
	<div class="row">
	<div class="col-sm-2">
	</div>
	<div class="col-sm-6">
  <h2>Cadastrar Series</h2>        
  <form method="post" action="/Series" enctype="multipart/form-data">
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
				<label  for="assistido">Assistido </label>
				<input type="text" id="assistido" name="assistido">
			</div>
			<div>
				<label  for="avaliacao">Avaliacao </label>
				<input type="text" id="avaliacao" name="avaliacao">
			</div>
                        <input type="file" name="imagem" id="imagem">
		<button class="btn btn-primary mt-2">Adicionar</button>
	</form>
  </div>
  <div class="col-sm-2">
	</div>
  </div>
</div>
   @endsection