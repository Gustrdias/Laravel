<?php

namespace App\Http\Controllers;
use App\Serie;
use App\Http\Requests\seriesFormRequest;
use Illuminate\Http\Request;

class SerieController extends Controller
{
   
    public function index(Request $request){
	$series = Serie::query()->orderBy('nome')->get();
        $mensagem= $request->session()->get('mensagem');
                        
	return view('series.listar',['series' => $series,'mensagem' => $mensagem]);
    }
    public function create(){
	return view('series.adicionar');
    }
    public function edit($id){
	$series = Serie::find($id);
	return view('series.editar',['serie'=> $series,'serieId' => $series->id]);
    }
	public function store(SeriesFormRequest $request){
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
                $request->session()->flash('mensagem',"Série $request->nome criada com sucesso");
		return redirect()->route('listar_Series');
	}
	public function destroy($id){
		$serie = Serie::find($id);
                 \Storage::delete($serie->imagem);
		$serie->delete();
		return redirect()->route('listar_series');
	}
	public function update(Request $request, $id){
		$serie = Serie::find($id);
		$serie->nome = $request->nome;
		$serie->genero = $request->genero;
		$serie->assistido = $request->assistido;
                $serie->avaliacao = $request->avaliacao;
                 if($request->imagem->isValid()){
                    \Storage::delete($serie->imagem);
                    $imagemPath=$request->file('imagem')->store('Imagens');
                     $serie->imagem = $imagemPath;//adicionar caminho da imagem
                 }
               
		$serie->save();
		return redirect()->route('listar_Series');
	}

}
