<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Episodio extends Model
{
   protected $fillable=['nome','numero','comentario','imagem'];
	public $timestamps=false;
	
    public function temporadas(){
		return $this->belongsTo (Temporada::class);
	}
}
