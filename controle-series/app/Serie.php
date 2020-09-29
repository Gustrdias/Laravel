<?php

namespace App;
use App\Detalhe;
use App\Temporada;
use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
    protected $fillable=['nome','avaliacao','genero','assistido','imagem'];
	public $timestamps=false;
	
	public function detalhes(){
		return $this->hasMany(Detalhe::class);
	}
        public function temporadas(){
		return $this->hasMany(Temporada::class);
	}
}
