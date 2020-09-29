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
        <div class="col-sm-6 formulario" style="">
            <h2 class="txtB">Cadastrar detalhes Série {{$serieNome}}</h2>        
            <form method="post" action="/series/{{$serieId}}/detalhes" enctype="multipart/form-data">
            @csrf              
                <label class="txtB" for="ano">Ano </label><br>
                <input type="text" id="ano" name="ano"><br>         
                <label class="txtB" for="local">Local </label><br>
                <input type="text" id="local" name="local"><br>            
                <label class="txtB" for="comentario">Comentário </label><br>
                <textarea type="text" style="color: black; " id="comentario" name="comentario"></textarea><br>     
                <label class="txtB" for="comentario">Imagem do background </label><br>
                <input type="file" name="imagem" id="imagem" ><br>
                <p><button class="btn btn-primary mt-2">Adicionar</button></p>
            </form>
        </div>
    <div class="col-sm-3"></div>
  </div>
</div>
   @endsection