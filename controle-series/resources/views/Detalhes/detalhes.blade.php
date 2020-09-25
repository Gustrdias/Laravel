@extends('layout')
	@section('conteudo')
<div class="container">

	<div class="">        
        <div class="sub-title" style="background-image:url(https://image.tmdb.org/t/p/original/3ib0uov9Qq9JtTIEGL39irTa3vZ.jpg);margin-bottom: 0px;background-size: cover;background-position: 50% 30%;padding: 70px 0;">
              <div class="container">
                  <div class="sub-title-inner">
                      <div class="row">
                          <div class="col-sm-12">
                              <h2>{{$serieNome}}</h2>
                          </div>
                      </div>
                  </div>
              </div>
        </div>
            <table>
                <tbody>
     @foreach($detalhes as $detalhe)
	<tr>
            <td>{{$detalhe->temporada}}</td>
            <td>{{$detalhe->ano}}</td>
            <td>{{$detalhe->duracao}}</td>
            <td>{{$detalhe->legenda}}</td>
             <td>{{$detalhe->local}}</td>
              <td>{{$detalhe->comentario}}</td>
            <td>
               <a href="/Series/{{$serieId}}/detalhes" class="btn btn-warning btn-sm mr-2">Acessar</a>
            </td>
	</tr>
      @endforeach
    </tbody>
  </table>
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">Temporadas</a></li>
    <li><a href="/Series/{{$serieId}}/detalhes/create" class="btn btn-sucess btn-sm mr-2"">Nova Temporada</a></li>
    <li><a href="/Series/{{$serieId}}/detalhes/create" class="btn btn-warning btn-sm mr-2"">Editar página</a></li>
  </ul>
  <div class="tab-content">
    <div id="home" >
        <div class="item">
            <a href="https://legendasnahora.com/download/8469-manifest-S01E01">
                <div>
                    <img class="img-responsive" src="https://image.tmdb.org/t/p/original/lFPHeAedYwKpF1iW83qKXtPoX9B.jpg" alt="Manifest">
                </div>
            </a>
            <a href="/Series/{{$serieId}}/detalhes/create" class="btn btn-danger btn-sm mr-2"">X</a>        
            <div class="temporada">temporada</div>
        </div>
    </div>
  </div>
  
</div>
   @endsection
