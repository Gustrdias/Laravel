@extends('layout')
	@section('conteudo')
	
<div class="container">
    <div class="row">
	<div class="col-sm-3"></div>
	<div class="col-sm-6 formulario">
            <h2 class='txtB'>Editar Detalhes</h2>        
            <form method="post" action="/Series/{{$serieId}}/detalhes/{{$detalhe->id}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <label class='txtB' for="ano">Ano </label><br>
                <input type="text" id="ano" name="ano" value="{{$detalhe->ano}}"><br>         
                <label class='txtB' for="local">Local </label><br>
                <input type="text" id="local" name="local" value="{{$detalhe->local}}"><br>            
                <label class='txtB' for="comentario">Comentário </label><br>
                <textarea type="text" style="color: black; " id="comentario" name="comentario" value="{{$detalhe->comentario}}"></textarea><br>     
                <label class='txtB' for="comentario">Imagem do background: </label><br>
                <input type="file" name="imagem" id="imagem" value="{{$detalhe->imagem}}"><br>
                <button class="btn btn-primary mt-2">Editar</button>
            </form>
        </div>
        <div class="col-sm-3"></div>
    </div>
</div>
   @endsection