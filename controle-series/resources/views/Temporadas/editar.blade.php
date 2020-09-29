@extends('layout')
	@section('conteudo')
	
<div class="container">
    <div class="row">
	<div class="col-sm-3"></div>
        <div class="col-sm-6 formulario">
            <h2 class="txtB">Editar Temporada</h2>        
            <form method="post" action="/series/{{$serieId}}/detalhes/temporada/{{$temporadas->id}}" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')
                  <label class="txtB" for="numero">Número da temporada</label><br>
                  <input type="text"  id="numero" name="numero" value="{{$temporadas->numero}}"><br>
                  <label class="txtB" for="imagem">Imagem</label><br>
                  <input type="file" name="imagem" id="imagem" value="{{$temporadas->imagem}}"><br>
                  <p><button class="btn btn-primary mt-2">Editar</button></p>
              </form>
        </div>
        <div class="col-sm-3"></div>
  </div>
</div>
   @endsection