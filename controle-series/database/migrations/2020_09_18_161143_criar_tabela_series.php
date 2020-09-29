<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarTabelaSeries extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('series', function(Blueprint $table) {
			$table->increments('id');
			$table->string('nome');
			$table->string('genero');
			$table->float('avaliacao')->nullable();
			$table->string('assistido');
			$table->string('imagem')->nullable();//caminho para uma imagem
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('series');
    }
}
