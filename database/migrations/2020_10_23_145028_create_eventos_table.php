<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eventos', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->string('TITULO');
            $table->string('DESCRIPCION');
            $table->dateTime('INICIO');
            $table->dateTime('FIN');
            $table->string('COLOR_TEXTO');
            $table->string('COLOR_FONDO');
            $table->string('created_by')->default('admin');
            $table->softDeletes(); //Nueva línea, para el borrado lógico
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('eventos');
    }
}
