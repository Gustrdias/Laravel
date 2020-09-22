<?php

namespace App\Http\Controllers;
use App\Detalhe;
use App\Serie;
use Illuminate\Http\Request;

class detalheController extends Controller
{
    public function index(Request $request, $serieId) {
		$Detalhes = Detalhe::query()->where('serie_id',$serieId)->get();
		$Serie = Serie::find($serieId);
		return view('Detalhes.listar', ['Detalhes' => $Detalhes,'serieId' => $serieId,'serieNome' => $Serie->nome]);
	}
	public function create($serieId){
		return view('Detalhes.adicionar', ['serieId' => $serieId]);
	}
	public function edit($serieId, $id){
		$Detalhe = Detalhe::find($id);
		return view('Detalhes.editar', ['Detalhe' => $Detalhe,'serieId' => $serieId]);
	}
	public function store(Request $request, $serieId){
		
		$Detalhe = new Detalhe($request->all());
		$Serie = Serie::find($serieId);
		$Serie->detalhes()->save($Detalhe);
		return redirect()->route('Detalhes', ['serieId' => $serieId]);
	}
	public function destroy($id, $serieId){
		$Detalhe = Detalhe::find($id);
		$Detalhe->delete();
		return redirect()->route('Detalhes', ['serieId' => $serieId]);
	}
	public function update(Request $request, $serieId, $id){
		$Detalhe = Detalhe::find($id);
		$Detalhe->descricao = $request->descricao;

		$Detalhe->save();
		return redirect()->route('Detalhes', ['serieId' => $serieId]);
	}
}
