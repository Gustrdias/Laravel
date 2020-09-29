<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EpisodiosFormRequest;
use App\Episodio;
use App\Temporada;

class episodioController extends Controller
{
     public function __construct() 
    {
        return $this->middleware('auth');
    }
    public function index(Request $request,$serieId,$tempoId){
		$episodios = Episodio::query()->where('temporada_id',$tempoId)->orderBy('numero')->get();
		return view('Episodios.episodios',['episodios' => $episodios,'serieId' => $serieId, 'tempoId' => $tempoId]);
	}
	public function create($serieId,$tempoId){
		return view('Episodios.adicionar', ['serieId' => $serieId,'tempoId' => $tempoId]);
	}
	public function edit($serieId,$tempoId,$epId){
		$episodios = Episodio::find($epId);
		return view('Episodios.editar',['episodio'=> $episodios,'serieId' => $serieId,'tempoId' => $tempoId]);
	}
	public function store(EpisodiosFormRequest $request,$serieId,$tempoId){
        $data=$request->only('numero','titulo','comentario');
        if($request->imagem->isValid()){
            $imagemPath=$request->file('imagem')->store('Imagens');
            $data['imagem']=$imagemPath;//adicionar caminho da imagem
        }
		$episodio = new Episodio($data);
		$temporada = Temporada::find($tempoId);
		$temporada->episodios()->save($episodio);
		return redirect()->route('listar_Episodios', ['serieId' => $serieId,'tempoId' => $tempoId]);
	}
	public function destroy($serieId,$tempoId,$epId){
		$episodio = Episodio::find($epId);
        \Storage::delete($episodio->imagem);
		$episodio->delete();
		return redirect()->route('listar_Episodios', ['serieId' => $serieId,'tempoId' => $tempoId]);
	}
	public function update(Request $request,$serieId,$tempoId,$epId){
		$episodio = Episodio::find($epId);
		$episodio->numero = $request->numero;
		if(!is_null($request->imagem)){
		if($request->imagem->isValid()){
                     \Storage::delete($episodio->imagem);
                    $imagemPath=$request->file('imagem')->store('Imagens');
                    $episodio->imagem = $imagemPath;//adicionar caminho da imagem
                 }
		}
		$episodio->save();
		return redirect()->route('listar_Episodios',['serieId' => $serieId,'tempoId' => $tempoId]);
	}
}
