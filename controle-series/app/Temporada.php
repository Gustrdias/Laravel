<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Temporada extends Model
{
    protected $fillable=['numero','comentario','imagem'];
	public $timestamps=false;
	
    public function episodios(){
		return $this->hasMany(Episodio::class);
	}
	public function detalhes(){
		return $this->belongsTo (Detalhe::class);
	}
}
