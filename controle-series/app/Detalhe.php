<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detalhe extends Model
{
	protected $fillable=['temporada','ano','duracao','episodios','idioma','legenda','comentario','local'];
	public $timestamps=false;
	
    public function series(){
		return $this->belongsTo (Serie::class);
	}
	 public function temporadas(){
		return $this->hasMany(Temporada::class);
	}
}
