@extends('layout')
    @section('conteudo')
        @if(!empty($mensagem))
            <div class="alert alert-success">{{$mensagem}}</div>
        @endif
<div class="container" style="display: block;">
    <div class="row">
	<div class="col-sm-1"></div>
        <div class="col-sm-10 fundot">
            <div style="text-align: center;"><h1 class="txtB">Lista de Séries</h1>
                <p><a href="/series/create" class="btn btn-success btn-sm">Criar Novo</a></p>
            </div>
             @foreach($series as $serie)
            <div class="row" style=" border-width:1px; border-style:solid; ">
                <div class="col-sm-3 serie-image" style="background-image: url('{{asset("storage/".$serie->imagem)}}');" ></div>
                <div class="col-sm-3 txtB" >
                    <div><h2>{{$serie->nome}}</h2></div>
                    <div><h5>Genero: {{$serie->genero}}</h5></div>   
                </div>
                 <div class="col-sm-2" style="text-align: center;">
                    <div class='borda txtB'><p>Assistido</p><h4>{{$serie->assistido}}</h4></div>
                    <p class='ita txtB'>Nota</p><h2 style="color : gold;">{{$serie->avaliacao}}/100</h2>
                </div>
                 <div class="col-sm-3" style="top: 40px; left: 70px;" >
                    <a href="/series/{{$serie->id}}/detalhes" class="btn btn-warning btn-sm ">Detalhes</a>       
                </div>
                <div class="col-sm-1" style="top: 30px;">
                    @auth
                    <div><p><a href="/series/{{$serie->id}}/edit" class="btn btn-success btn-sm">Editar</a></p>      
                        <form method="post" action="/series/{{$serie->id}}"
                              onsubmit="return confirm('Tem certeza que deseja remover essa série?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm btn-sm mr-2">Remover</button>
                        </form>
                    </div>  
                    @endauth
              </div>
            </div><br>
              @endforeach
        </div>
        <div class="col-sm-1"></div>
    </div>
</div>
   @endsection
