<?php

namespace App\Http\Controllers;
use App\Temporada;
use App\Detalhe;
use Illuminate\Http\Request;

class temporadaController extends Controller
{
    public function index(){
		$temporada = Temporada::query()->orderBy('numero')->get();
		$detalhes = Detalhe::query()->get();
		return view('Temporadas.lista',['temporadas' => $temporadas,'detalhes' => $detalhes]);
	}
	public function create($detalhesId){
		return view('Temporadas.adicionar', ['detalhesId' => $detalhesId]);
	}
	public function edit($detalhesId,$id){
		$temporada = Temporada::find($id);
		return view('Temporada.editar',['temporadas'=> $temporadas,'detalhesId' => $detalhesId]);
	}
	public function store(Request $request,$detalheId){
		$Temporada = new Temporada($request->all());
		$Detalhe = Detalhe::find($detalheId);
		$Detalhe->temporadas()->save($Detalhe);
		return redirect()->route('Detalhes', ['detalheId' => $detalheId]);
	}
	public function destroy($id,$detalhesId){
		$temporada = Temporada::find($id);
		$temporada->delete();
		return redirect()->route('Temporadas',['detalhesId' => $detalhesId]);
	}
	public function update(Request $request,$detalhesId, $id){
		$temporada = Temporada::find($id);
		$temporada->numero = $request->numero;
		$temporada->comentario = $request->comentario;
		$temporada->imagem = $request->imagem;
		$temporada->save();
		return redirect()->route('listar_Temporadas');
	}
}
