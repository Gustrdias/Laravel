<?php

namespace App\Http\Controllers;
use App\Serie;
use Illuminate\Http\Request;

class listaController extends Controller
{
	public function index(){
		$series = Serie::query()->orderBy('nome')->get();
		$detalhes = Detalhe::query()->get();
		return view('Series.lista',['series' => $series,'detalhes' => $detalhes]);
	}
	public function create(){
		return view('Series.adicionar');
	}
	public function edit($id){
		$serie = Serie::find($id);
		return view('editar_Series',['series'=> $series]);
	}
	public function store(Request $request){
		//DB::beginTransaction();
		Serie::create($request->all());
		//DB::commit();
		return redirect()->route('listar_Series');
	}
	public function destroy($id){
		$serie = Serie::find($id);
		$serie->delete();
		return redirect()->route('listar_Series');
	}
	public function update(Request $request, $id){
		$serie = Serie::find($id);
		$serie->nome = $request->nome;
		$serie->genero = $request->genero;
		
		$serie->save();
		return redirect()->route('listar_Series');
	}
	
	
	
	
  
}
