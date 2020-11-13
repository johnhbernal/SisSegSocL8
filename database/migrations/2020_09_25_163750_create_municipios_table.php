<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateMunicipiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('p_municipio', function (Blueprint $table) {
            $table->increments ( 'CODIGO_MUNICIPIO' )->unique();
			$table->integer ( 'CODIGO_DEPARTAMENTO' )->unsigned ();
			$table->foreign ( 'CODIGO_DEPARTAMENTO' )->references ( 'CODIGO_DEPARTAMENTO' )->on ( 'p_departamento' )->constrained()->onDelete('cascade');
            // $table->string ( 'NOMBRE' )->unique();
            $table->string ( 'NOMBRE' );
            $table->string ( 'REGION' );
			$table->string ( 'created_by' )->default ( 'admin' );
            $table->softDeletes(); //Nueva línea, para el borrado lógico
			$table->timestamps ();
        });
        DB::statement('ALTER TABLE p_municipio CHANGE CODIGO_MUNICIPIO CODIGO_MUNICIPIO INT(5) UNSIGNED ZEROFILL NOT NULL');
        DB::statement('ALTER TABLE p_municipio CHANGE CODIGO_DEPARTAMENTO CODIGO_DEPARTAMENTO INT(5) UNSIGNED ZEROFILL NOT NULL');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('p_municipio');
    }
}
