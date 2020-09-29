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
            <h2 class="txtB">Cadastrar Séries</h2>        
            <form method="post" action="/series" enctype="multipart/form-data">
                @csrf
                <label class="txtB" for="nomeSerie">Nome</label><br>
                <input type="text"  id="nome" name="nome"><br>
                <label class="txtB" for="genero">Genero </label>
                <select id="genero" name="genero">
                    <option value="Ação">Ação</option>
                    <option value="Comédia">Comédia</option>
                    <option value="Drama">Drama</option>
                    <option value="Aventura">Aventura</option>
                    <option value="Terror">Terror</option>
                    <option value="Ciêntifico">Ciêntifico</option>
                    <option value="Romance">Romance</option>
                    <option value="Suspence">Suspence</option>
                    <option value="Musical">Musical</option>
                </select><br>
                <label class="txtB" for="assistido">Assistido </label><br>
                <input type="text" id="assistido" name="assistido"><br>
                <label class="txtB" for="avaliacao">Avaliacao </label><br>
                <input type="text" id="avaliacao" name="avaliacao"><br>
                <label class="txtB" for="imagem">Imagem </label><br>
                <input type="file" name="imagem" id="imagem">
                <p><button class="btn btn-primary mt-2">Adicionar</button></p>
            </form>
			<a class="btn btn-warning mt-2" style="float:right;" href="{{ url()->previous() }}">Voltar</a><br>
        </div>
        <div class="col-sm-3"></div>
    </div>
</div>
   @endsection