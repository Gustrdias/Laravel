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
			$table->string('imagem');
			$table->integer('serie_id');
			$table->foreign('serie_id')->references('id')->on('series')->onDelete('cascade');
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
