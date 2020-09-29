@extends('layout')
    @section('conteudo')
<div class=" fundot">
    <div>
        <div class="txtB" style="text-align: center;"><h2>Episódios</h2>
			<a href="/series/{{$serieId}}/detalhes/temporada/{{$tempoId}}/episodios/create" class="btn btn-primary btn-sm mr-2">Novo Episodio</a>
			<a class="btn btn-warning mt-2" style="float:right;" href="{{ route('detalhes', ['serieId' => $serieId]) }}">Voltar</a><br>
		</div>
	</div><br>
	<div class="row">
		<div class="col-sm-3"></div>
		<div class="col-sm-8">
        <table>
		@foreach($episodios as $episodio)
            <tr class="txtB " >
                <td><img class="imgT bordaF" src="{{asset("storage/".$episodio->imagem)}}""></td>
				<td style="padding-left: 10px;"><h2>Episódio {{$episodio->numero}} - {{$episodio->titulo}}</h2><br>
				<h4 style="overflow-wrap: break-word;">{{$episodio->comentario}}</h4><br><br>
				<a style="float:left;" href="/series/{{$serieId}}/detalhes/temporada/{{$tempoId}}/episodios/{{$episodio->id}}/edit" class="btn btn-warning btn-sm mr-2">Editar</a>
					<form style="float:left" method="post" action="/series/{{$serieId}}/detalhes/temporada/{{$tempoId}}/episodios/{{$episodio->id}}"
                     onsubmit="return confirm('Tem certeza que deseja remover esse episódio?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm btn-sm mr-2">X</button>
                    </form>
				</td>
            </tr><br>
		@endforeach
        </table>
		</div>
    </div>   
</div>
 @endsection