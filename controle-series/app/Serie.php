<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
    protected $fillable=['nome','avaliacao','genero','assistido'];
	public $timestamps=false;
	
	public function detalhes(){
		return $this->hasMany(Detalhe::class);
	}
}
