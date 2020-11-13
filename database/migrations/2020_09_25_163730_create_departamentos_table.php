<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateDepartamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('p_departamento', function (Blueprint $table) {
            // $table->id();
            $table->increments ( 'CODIGO_DEPARTAMENTO' );
			$table->integer ( 'CODIGO_PAIS' )->unsigned ();
			$table->foreign ( 'CODIGO_PAIS' )->references ( 'CODIGO_PAIS' )->on ( 'p_pais' )->constrained()->onDelete('cascade');
			$table->string ( 'NOMBRE' );
			$table->string ( 'created_by' )->default ( 'admin' );
            $table->softDeletes(); //Nueva línea, para el borrado lógico
			$table->timestamps ();
        });
        DB::statement('ALTER TABLE p_departamento CHANGE CODIGO_DEPARTAMENTO CODIGO_DEPARTAMENTO INT(5) UNSIGNED ZEROFILL NOT NULL');
        DB::statement('ALTER TABLE p_departamento CHANGE CODIGO_PAIS CODIGO_PAIS INT(5) UNSIGNED ZEROFILL NOT NULL');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        // Schema::table ( 'p_departamento', function (Blueprint $table) {
		// 	$table->dropForeign ( 'p_departamento_codigo_pais_foreign' );
    	// } );
        Schema::dropIfExists('p_departamento');
    }
}
