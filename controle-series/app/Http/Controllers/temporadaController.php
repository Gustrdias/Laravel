<?php

namespace App\Http\Controllers;
use App\Temporada;
use App\Serie;
use Illuminate\Http\Request;
use App\Http\Requests\TemporadasFormRequest;

class temporadaController extends Controller
{
    public function __construct() 
    {
        return $this->middleware('auth');
    }
   
    public function create($serieId){
          
	return view('Temporadas.adicionar', ['serieId' => $serieId]);
    }
    public function edit($serieId,$tempId){
	$temporadas = Temporada::find($tempId);
	return view('Temporadas.editar',['temporadas'=> $temporadas,'serieId' => $serieId]);
    }
    public function store(TemporadasFormRequest $request,$serieId){
        $data=$request->only('numero');
        if($request->imagem->isValid()){
            $imagemPath=$request->file('imagem')->store('Imagens');
            $data['imagem']=$imagemPath;//adicionar caminho da imagem
        }
	$temporada = new Temporada($data);
	$serie = Serie::find($serieId);
	$serie->temporadas()->save($temporada);
	return redirect()->route('detalhes', ['serieId' => $serieId]);
    }
    public function destroy($serieId,$tempId){
	$temporada = Temporada::find($tempId);
        \Storage::delete($temporada->imagem);
	$temporada->delete();
	return redirect()->route('detalhes', ['serieId' => $serieId]);
    }
    public function update(Request $request, $serieId, $id){
	$temporada = Temporada::find($id);
	$temporada->numero = $request->numero;
	if($request->imagem->isValid()){
            \Storage::delete($temporada->imagem);
            $imagemPath=$request->file('imagem')->store('Imagens');
            $temporada->imagem = $imagemPath;//adicionar caminho da imagem
        }
	$temporada->save();
	return redirect()->route('detalhes', ['serieId' => $serieId]);
    }
}
