@extends('layout')
	@section('conteudo')
	@if($errors->any())
            <div class="alert alert-danger">
                <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
                </ul>
            </div>
        @endif
<div class="container">
    <div class="row">
	<div class="col-sm-3"></div>
        <div class="col-sm-6 formulario">
            <h2 class="txtB">Cadastrar Temporada</h2>        
            <form method="post" action="/series/{{$serieId}}/detalhes/temporada" enctype="multipart/form-data">
                  @csrf
                  <label class="txtB" for="numero">Número da temporada</label><br>
                  <input type="text"  id="numero" name="numero"><br>
                  <label class="txtB" for="imagem">Imagem</label><br>
                  <input type="file" name="imagem" id="imagem"><br>
                  <p><button class="btn btn-primary mt-2">Adicionar</button></p>
              </form>
        </div>
        <div class="col-sm-3"></div>
  </div>
</div>
   @endsection