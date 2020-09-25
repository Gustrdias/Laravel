<?php

namespace App\Http\Controllers;
use App\Serie;
use Illuminate\Http\Request;

class listaController extends Controller
{
	public function index(){
		$series = Serie::query()->orderBy('nome')->get();
		
		return view('Series.listar',['series' => $series]);
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
            //pegar apenas dados especificos
            $data=$request->only('nome','avaliacao','genero','assistido');
            if($request->imagem->isValid()){
                $imagemPath=$request->file('imagem')->store('Imagens');
                $data['imagem']=$imagemPath;//adicionar caminho da imagem
            }
		//Serie::create($request->all());
                Serie::create($data);
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
		$serie->assistido = $request->assistido;
                $serie->avaliacao = $request->avaliacao;
		$serie->save();
		return redirect()->route('listar_Series');
	}

}
