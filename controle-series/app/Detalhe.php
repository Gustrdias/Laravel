<?php

namespace App;
use App\Temporada;
use App\Serie;
use Illuminate\Database\Eloquent\Model;

class Detalhe extends Model
{
    protected $fillable=['ano','imagem','comentario','local'];
    public $timestamps=false;
	
    public function series(){
	return $this->belongsTo(Serie::class);
    }
    public function temporadas(){
       	return $this->hasMany(Temporada::class);
    }
}
