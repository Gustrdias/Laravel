<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarTabelaTemporadas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('temporadas', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('numero');
                        $table->integer('episodios');
			$table->string('comentario');
			$table->string('imagem');
			$table->integer('detalhes_id');
			$table->foreign('detalhes_id')->references('id')->on('detalhes');
		});
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('temporadas');
    }
}
