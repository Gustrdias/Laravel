<?php

namespace App\Http\Controllers;
use App\Detalhe;
use App\Serie;
use Illuminate\Http\Request;

class detalheController extends Controller
{
    public function index(Request $request, $serieId) {
		$detalhes = Detalhe::query()->where('serie_id',$serieId)->get();
		$serie = Serie::find($serieId);
		return view('Detalhes.detalhes', ['detalhes' => $detalhes,'serieId' => $serieId,'serieNome' => $serie->nome]);
	}
	public function create($serieId){
                $serie = Serie::find($serieId);
		return view('Detalhes.adicionar', ['serieId' => $serieId,'serieNome' => $serie->nome]);
	}
	public function edit($serieId, $id){
		$detalhe = Detalhe::find($id);
		return view('Detalhes.editar', ['detalhe' => $detalhe,'serieId' => $serieId]);
	}
	public function store(Request $request, $serieId){
		$detalhe = new Detalhe($request->all());
		$serie = Serie::find($serieId);
		$serie->detalhes()->save($detalhe);
		return redirect()->route('detalhes', ['serieId' => $serieId]);
	}
	public function destroy($id, $serieId){
		$detalhe = Detalhe::find($id);
		$detalhe->delete();
		return redirect()->route('detalhes', ['serieId' => $serieId]);
	}
	public function update(Request $request, $serieId, $id){
		$detalhe = Detalhe::find($id);
		$detalhe->descricao = $request->descricao;

		$detalhe->save();
		return redirect()->route('detalhes', ['serieId' => $serieId]);
	}
}
