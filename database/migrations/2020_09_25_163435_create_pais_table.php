<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;


class CreatePaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('p_pais', function (Blueprint $table) {
            // $table->id();
            $table->increments('CODIGO_PAIS')->unique();
            $table->string('NOMBRE')->unique();
            $table->char('ISO', 5)->unique();
            $table->integer('CODIGO_TELEFONICO')->unique();
            $table->string('created_by')->default('admin');
            $table->softDeletes(); //Nueva línea, para el borrado lógico
            $table->timestamps();
        });
        DB::statement('ALTER TABLE p_pais CHANGE CODIGO_PAIS CODIGO_PAIS INT(5) UNSIGNED ZEROFILL NOT NULL');
		DB::statement('ALTER TABLE p_pais CHANGE CODIGO_TELEFONICO CODIGO_TELEFONICO INT(5) UNSIGNED ZEROFILL NOT NULL');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('p_pais');
    }
}
