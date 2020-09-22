<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarTabelaDetalhes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalhes', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('ano');
			$table->string('duracao');
			$table->integer('temporada');
			$table->integer('episodios');
			$table->string('idioma');
			$table->string('legenda');
			$table->string('comentario');
			$table->string('local');
			$table->integer('series_id');
			$table->foreign('series_id')->references('id')->on('series');
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::drop('detalhes');
    }
}
