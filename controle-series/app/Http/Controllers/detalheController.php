<?php

namespace App\Http\Controllers;
use App\Detalhe;
use App\Serie;
use App\Temporada;
use Illuminate\Http\Request;
use App\Http\Requests\DetalhesFormRequest;

class detalheController extends Controller
{
    public function __construct() 
    {
        return $this->middleware('auth');
    }
    public function index(Request $request, $serieId) {
	$detalhes = Detalhe::query()->where('serie_id',$serieId)->get();
        $temporadas = Temporada::query()->where('serie_id',$serieId)->orderBy('numero')->get();
        $serie = Serie::find($serieId);
	return view('Detalhes.detalhes', ['detalhes' => $detalhes,'serieId' => $serieId,'serieNome' => $serie->nome,'temporadas' => $temporadas]);
    }
    public function create($serieId){
        $serie = Serie::find($serieId);
	return view('Detalhes.adicionar', ['serieId' => $serieId,'serieNome' => $serie->nome]);
    }
    public function edit($serieId, $id){
        $detalhe = Detalhe::find($id);
	return view('Detalhes.editar', ['detalhe' => $detalhe,'serieId' => $serieId]);
    }
    public function store(DetalhesFormRequest $request, $serieId){
        $data=$request->only('ano','comentario','local');
        if($request->imagem->isValid()){
            $imagemPath=$request->file('imagem')->store('Imagens');
            $data['imagem']=$imagemPath;//adicionar caminho da imagem
        }     
	$detalhe = new Detalhe($data);
	$serie = Serie::find($serieId);
	$serie->detalhes()->save($detalhe);
	return redirect()->route('detalhes', ['serieId' => $serieId]);
    }
    public function destroy($id, $serieId){
	$detalhe = Detalhe::find($id);
         \Storage::delete($detalhe->imagem);
	$detalhe->delete();
	return redirect()->route('detalhes', ['serieId' => $serieId]);
    }
    public function update(Request $request, $serieId, $id){
	$detalhe = Detalhe::find($id);
	$detalhe->ano = $request->ano;
        $detalhe->local = $request->local;
        $detalhe->comentario = $request->comentario;
		if(!is_null($request->imagem)){
			if($request->imagem->isValid()){
				\Storage::delete($detalhe->imagem);
				$imagemPath=$request->file('imagem')->store('Imagens');
				$detalhe->imagem = $imagemPath;//adicionar caminho da imagem
			}
		}
	$detalhe->save();
	return redirect()->route('detalhes', ['serieId' => $serieId]);
    }
}
