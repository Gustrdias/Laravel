<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EpisodiosFormRequest;
use App\Episodio;
use App\Detalhe;

class episodioController extends Controller
{
     public function __construct() 
    {
        return $this->middleware('auth');
    }
    public function index(){
		$episodios = Episodio::query()->orderBy('numero')->get();
		$detalhes = Detalhe::query()->get();
		return view('Episodios.episodios',['episodios' => $episodios,'detalhes' => $detalhes]);
	}
	public function create($serieId){
                //$serie = Serie::find($serieId);
		return view('Episodios.adicionar', ['serieId' => $serieId]);
	}
	public function edit($detalhesId,$id){
		$episodios = Episodio::find($id);
		return view('Episodios.editar',['episodios'=> $episodios,'detalhesId' => $detalhesId]);
	}
	public function store(EpisodiosFormRequest $request,$serieId,$tempoId){
            $data=$request->only('numero');
            if($request->imagem->isValid()){
                $imagemPath=$request->file('imagem')->store('Imagens');
                $data['imagem']=$imagemPath;//adicionar caminho da imagem
            }
		$episodio = new Episodio($data);
		$temporada = Temporada::find($tempoId);
		$temporada->episodios()->save($episodio);
		return redirect()->route('listar_Episodios', ['serieId' => $serieId]);
	}
	public function destroy($serieId,$tempoId,$epId){
		$episodio = Episodio::find($epId);
                \Storage::delete($episodio->imagem);
		$episodio->delete();
		return redirect()->route('listar_Episodios', ['serieId' => $serieId]);
	}
	public function update(Request $request, $id){
		$episodio = Episodio::find($id);
		$episodio->numero = $request->numero;
		if($request->imagem->isValid()){
                     \Storage::delete($episodio->imagem);
                    $imagemPath=$request->file('imagem')->store('Imagens');
                    $episodio->imagem = $imagemPath;//adicionar caminho da imagem
                 }
		$episodio->save();
		return redirect()->route('listar_Episodios');
	}
}
