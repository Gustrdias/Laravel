<?php

namespace App;
use App\Serie;
use App\Episodio;

use Illuminate\Database\Eloquent\Model;

class Temporada extends Model
{
    protected $fillable=['numero','imagem'];
	public $timestamps=false;
	
    public function episodios(){
	return $this->hasMany(Episodio::class);
    }
    public function series(){
        return $this->belongsTo (Serie::class);
    }
}
