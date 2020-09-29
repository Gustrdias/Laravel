<?php

namespace App;
use App\Temporada;
use Illuminate\Database\Eloquent\Model;

class Episodio extends Model
{
   protected $fillable=['titulo','numero','comentario','imagem'];
	public $timestamps=false;
	
    public function temporadas(){
		return $this->belongsTo (Temporada::class);
	}
}
