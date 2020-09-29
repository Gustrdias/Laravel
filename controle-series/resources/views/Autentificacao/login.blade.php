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
                <h2 class="txtB">Login</h2>        
                <form method="post">
                @csrf                     
                    <label class="txtB" for="email">E-mail </label><br>
                    <input type="text" id="email" name="email"><br>            
                    <label class="txtB" for="password">Senha </label><br>
                    <p><input type="password" id="password" name="password"></p>     
                    <button type="submit" class="btn btn-primary mt-2">Entrar</button>
                    <a href="/register" class="btn btn-warning mt-2">Registrar-se</a>
                </form>
            </div>
        <div class="col-sm-3"></div>
      </div>
    </div>
        @endsection