<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarTabelaEpisodios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('episodios', function(Blueprint $table) {
			$table->increments('id');
			$table->string('titulo');
			$table->integer('numero');
			$table->string('comentario')->nullable();
			$table->string('imagem');
			$table->integer('temporadas_id');
			$table->foreign('temporadas_id')->references('id')->on('temporadas');
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('episodios');
    }
}
