<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class listaController extends Controller
{
    public function index(Request $request){
		$data=$request->all();
		return view('Series.lista',['data'=>$data]);
	}
	public function adicionar(){
		return view('Series.adicionar');
	}
	public function criar(Request $request){
		$data=$request->all();
		return redirect()->route('lista_Series',['data'=>$data]);
	}
}
