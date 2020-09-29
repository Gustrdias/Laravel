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
            <h2 class='txtB'>Editar Episódios</h2>        
            <form method="post" action="/series/{{$serieId}}/detalhes/temporada/{{$tempoId}}/episodios/{{$episodio->id}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <label class='txtB' for="numero">Número </label><br>
                <input type="text" id="numero" name="numero" value="{{$episodio->numero}}"><br>         
                <label class='txtB' for="titulo">Título </label><br>
                <input type="text" id="titulo" name="titulo" value="{{$episodio->titulo}}"><br>            
                <label class='txtB' for="comentario">Comentário </label><br>
                <textarea type="text" style="color: black; " id="comentario" name="comentario" >{{$episodio->comentario}}</textarea><br>     
                <label class='txtB' for="imagem">Imagem do episódio </label><br>
                <input type="file" name="imagem" id="imagem" value="{{$episodio->imagem}}"><br>
                <button class="btn btn-primary mt-2">Editar</button>
            </form>
			<a class="btn btn-warning mt-2" style="float:right;" href="{{route('listar_Episodios',['serieId' => $serieId,'tempoId' => $tempoId]) }}">Voltar</a><br>
        </div>
        <div class="col-sm-3"></div>
    </div>
</div>
   @endsection