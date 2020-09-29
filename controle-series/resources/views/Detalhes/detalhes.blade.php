@extends('layout')
	@section('conteudo')
<div class="container"> 
    <div class="">
        @foreach($detalhes as $detalhe) 
         <div class="fundoTop" style="background-image:url('{{asset("storage/".$detalhe->imagem)}}');">
        @endforeach
            <div class="row">
                <div class="fundot" style="text-align: center;">
                    <h2 class="txtB ">{{$serieNome}}</h2>
                    @foreach($detalhes as $detalhe)
                    <h5 class="txtB ">Ano: {{$detalhe->ano}}</h5>
                    <h5 class="txtB ">Local Assistido :{{$detalhe->local}}</h5>
                    @endforeach
                </div>
            </div>    
        </div>
    </div>
    <div>
        <ul class="nav nav-tabs fundot">
          <li class="active"><a data-toggle="tab" style="">Temporadas</a></li>
          <li><a href="/series/{{$serieId}}/detalhes/temporada/create" class="btn btn-primary btn-sm mr-2">Nova Temporada</a></li>
          @if(empty($detalhes))
          <li><a href="/series/{{$serieId}}/detalhes/create" class="btn btn-warning btn-sm mr-2">Criar página</a></li>
          @else
            @foreach($detalhes as $detalhe)
              <li><a href="/series/{{$serieId}}/detalhes/{{$detalhe->id}}/edit" class="btn btn-warning btn-sm mr-2">Editar página</a></li>
            @endforeach
          @endif
        </ul>
    </div>
    <table>
        <tr> 
            @foreach($temporadas as $temporada)
            <td>
                <div style="padding-left: 50px;">
                     <div class="item fundot">
                            <div class="temporada txtB" style="text-align: center;"><h4>{{$temporada->numero}}ª temporada</h4></div>
                            <a href="/series/{{$serieId}}/detalhes/temporada/{{$temporada->id}}/episodios">
                                <div><img class="imgT" src="{{asset("storage/".$temporada->imagem)}}" alt="{{$serieNome}}"></div>
                            </a>
                           <a style="float:left" href="/series/{{$serieId}}/detalhes/temporada/{{$temporada->id}}/edit" class="btn btn-success btn-sm">Editar</a>
                           <form style="float:left"  method="post" action="/series/{{$serieId}}/detalhes/temporada/{{$temporada->id}}"
                            onsubmit="return confirm('Tem certeza que deseja remover essa temporada?')">
                              @csrf
                              @method('DELETE')
                              <button class="btn btn-danger btn-sm mr-2">X</button>
                            </form>
                        </div>
                </div>
            </td>
            @endforeach
        </tr>
        <tr>
            <td>
                <div class="fundot">
                    <p><h3 class="txtB">Comentário</h3></p>
                    @foreach($detalhes as $detalhe)
                    <textarea disabled name="comentario" rows="4" cols="70%"  style="resize: none;">{{$detalhe->comentario}}</textarea>
                    @endforeach 
                </div> 
            </td>
       </tr>
    </table>
</div>
   @endsection
