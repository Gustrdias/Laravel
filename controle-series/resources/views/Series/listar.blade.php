@extends('layout')
	@section('conteudo')
        <div class="container" style="display: block;">
    <div class="row">
	<div class="col-sm-1">
	</div>
        <div class="col-sm-10">
            <div style="text-align: center;"><h1>Lista de Séries</h1>
                <p><a href="/Series/create" class="btn btn-success btn-sm">Criar Novo</a></p>
            </div>          
             @foreach($series as $serie)
             <div class="row" style=" border-width:1px; border-style:solid; ">
                <div class="col-sm-3">
                    <img src="{{asset("storage/".$serie->imagem)}}" alt="" width="90%" height="100%">
                </div>
                <div class="col-sm-3" style="">
                    <div>
                        <h2>{{$serie->nome}}</h2>
                    </div>
                    <div>
                        <h5>Genero: {{$serie->genero}}</h5>
                    </div>   
                </div>
                 <div class="col-sm-2" style="text-align: center;">
                     <div style="border-bottom: 4px dotted blue;"><p>Assistido</p> {{$serie->assistido}}</div>
                     <p style="font-style: italic;">Nota</p><h2 style="color : gold;">{{$serie->avaliacao}}/10</h2>
                </div>
                 <div class="col-sm-2" style="top: 30px;" >
                        <a href="/Series/{{$serie->id}}/detalhes" class="btn btn-warning btn-sm ">Detalhes</a>       
                </div>
                <div class="col-sm-1" style="top: 30px;">
                    <div><p><a href="/Series/{{$serie->id}}/detalhes" class="btn btn-success btn-sm">Editar</a></p>      
                        <a href="/Series/{{$serie->id}}/detalhes" class="btn btn-danger btn-sm ">Remover</a></div>       
              </div>
            </div><br>
              @endforeach
        </div>
        <div class="col-sm-1">
           
        </div>
    </div>
</div>
   @endsection
