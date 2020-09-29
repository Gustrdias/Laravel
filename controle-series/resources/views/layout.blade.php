<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Series</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link href="{{asset('css/style.css')}}" rel="stylesheet">
    </head>
    <body style="background-image:url('{{asset("storage/Imagens/series.jpg")}}'); ">
        @auth
            <nav class="navbar navbar-expand-lg navbar-light bg-light mb-2">
			@if(\Route::current()->getName() != 'listar_Series')
            <a class="navbar navbar-expand-lg" href="{{ route('listar_Series') }}">Página inicial</a>
			@else
			<br>
			@endif
            <a href="/logout" class="text-danger">Deslogar</a>
            </nav>
        @endauth
	@yield('conteudo')
    </body>
</html>