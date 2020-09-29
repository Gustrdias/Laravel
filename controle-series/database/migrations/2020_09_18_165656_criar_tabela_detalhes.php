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
			$table->string('comentario')->nullable();
			$table->string('local');
                        $table->string('imagem')->nullable();
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
       Schema::drop('detalhes');
    }
}
