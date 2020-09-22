@extends('layout')
	@section('conteudo')
<div class="container">
	<div class="row">
	<div class="col-sm-2">
	<a href="/Series/create" class="btn btn-dark mb-2">Criar Novo</a>
	</div>
	<div class="col-sm-6">
  <h2>Lista de Séries</h2>          
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Nome</th>
        <th>Genero</th>
		<th>Assistido</th>
		<th>Avaliacao</th>
		<th>Detalhes</th>
      </tr>
    </thead>
    <tbody>
     @foreach($series as $serie)
		<tr>
        <td>{{$serie->nome}}</td>
		</tr>
		<tr>
        <td>{{$serie->genero}}</td>
		</tr>
		<tr>
        <td>{{$serie->asistido}}</td>
		</tr>
		<tr>
        <td>{{$serie->avaliacao}}</td>
		</tr>
	 @endforeach
    </tbody>
  </table>
  </div>
  <div class="col-sm-2">
	</div>
  </div>
</div>
   @endsection
