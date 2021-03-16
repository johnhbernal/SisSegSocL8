<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('p_usuario', function (Blueprint $table) {

            $table->increments( 'id');
// 			$table->bigIncrements( 'id');
			$table->integer ( 'NUM_IDENTIFICACION' )->unique ();
            // $table->string ( 'LOGIN_ID' )->unsigned ()->unique ()->nullable ();
            // $table->unsignedBigInteger ( 'LOGIN_ID' );
			// $table->foreign ( 'LOGIN_EMAIL' )->references ( 'email' )->on ( 'users' )->constrained()->onDelete('cascade');
			$table->enum ( 'TIPO_DOCUMENTO', array (
					'SC', // El Salvoconducto de Permanencia, es el documento de car�cter temporal expedido por la Unidad Administrativa Especial de Migraci�n Colombia.
					'CD', // El Carn� Diplom�tico, es el documento que identifica a extranjeros que cumplen funciones en las embajadas, legaciones,
					'PA', // El Pasaporte, es el documento de identificaci�n del extranjero que no se encuentra obligado a tramitar una c�dula de extranjer�a.
					'CE', // La C�dula de Extranjer�a, es el documento de identificaci�n expedido por Migraci�n Colombia, que se otorga a los extranjeros titulares de una visa superior a 3 meses y a sus beneficiarios, con base en el Registro de Extranjeros. La Vigencia de la C�dula de Extranjer�a ser� por un t�rmino igual al de la vigencia de la visa del titular.
					'CC', // La C�dula de Ciudadan�a, es el documento expedido por la Registradur�a Nacional del Estado Civil, con el que se identifican las personas al cumplir 18 a�os de edad.
					'TI', // La Tarjeta de Identidad, es un documento expedido por la Registradur�a Nacional del Estado Civil con el que se identifican los menores entre 7 y 17 a�os. Debe ser reemplazada por la c�dula de ciudadan�a.
					'RC', // El Registro Civil de Nacimiento, es el documento expedido por una notar�a p�blica con el que se identifican los menores de 7 a�os. Debe ser reemplazado por la tarjeta de identidad.
					'CN'  // El Certificado de Nacido Vivo, es el documento expedido por la Instituci�n Prestadora de Servicios (IPS) donde naci� el neonato. Solo tiene validez para realizar la afiliaci�n, y m�ximo hasta el tercer mes de vida. Debe ser reemplazado por el registro civil.
						     // ) )->default ( 'CC' );
			) );
			// $table->string('TIPO_DOCUMENTO');
			$table->string ( 'PRIMER_NOMBRE' );
			$table->string ( 'SEGUNDO_NOMBRE' )->nullable ();
			$table->string ( 'PRIMER_APELLIDO' );
			$table->string ( 'SEGUNDO_APELLIDO' )->nullable ();
			$table->date ( 'FECHA_DE_NACIMIENTO' );
			// $table->string ( 'ESTADO' );
			$table->enum ( 'ESTADO', array (
					'A', // ACTIVO
					'I', // INACTIVO ES CUANDO AUN NO SE TERMINA EL PROCESO DE AFILIACION
					'M', // MORA ES CUANDO SE PRESENTA RETRASO EN LOS PAGOS
					'D'  // DESACTIVADO CUANDO EL TRABAJADOR SE RETIRA DE LA EMPRESA
			) );
			$table->enum ( 'SEXO', array (
					'M', // MASCULINO
					'F'  // FEMENINO
			) );
			$table->enum ( 'GRUPO_SANGUINEO', array (
					'A', // GRUPO_SANGUINEO A
					'B', // GRUPO_SANGUINEO B
					'O', // GRUPO_SANGUINEO O
					'AB'  // GRUPO_SANGUINEO AB
			) );
			$table->enum ( 'FACTOR_RH', array (
					'+', // FACTOR_RH POSITIVO
					'-'  // FACTOR_RH NEGATIVO
			) );
			$table->enum ( 'ESTADO_CIVIL', array (
					'S', // Soltero/a
					'P', // Comprometido/a
					'U', // Union Libre
					'E', // Separado/a
					'C', // Casado/a
					'D', // Divorciado/a
					'V'  // Viudo/a
			) );
			$table->enum ( 'VINCULO_LABORAL', array (
					'C', // Afiliado/a o Cotizante
					'B'  // Beneficiario/a
			) );
			//discapacidad. Este espacio debe diligenciarse solo en el caso en que el cotizante o cabeza de familia tenga una discapacidad reconocida y calificada m�dicamente.
			$table->boolean('DISCAPACIDAD')->default(false);
			//Tipo de discapacidad.
			$table->enum ( 'TIPO_DISCAPACIDAD', array (
					'F', // F�sica
					'N',  // Neuro-sensorial
					'M'//Mental
			) )->nullable ();
			//Condici�n de discapacidad
			$table->enum ( 'CONDICION_DISCAPACIDAD', array (
					'T', // Temporal
					'P'  // Permanente
			) )->nullable ();
			$table->enum ( 'ETNIA', array (
					'01', // Ind�gena
					'02', // Rrom (gitano).
					'03', // Raizal (San Andr�s y Providencia).
					'04', // Palenquero (San Basilio de Palenque).
					'05'  // Negro(a), afrocolombiano(a).
			) )->nullable ()->default(null);
         //   $table->string('guard_name')->default('web');
			$table->string ( 'created_by' )->default ( 'admin' );
            $table->softDeletes(); //Nueva línea, para el borrado lógico
			$table->timestamps ();
        });

        // Schema::table('p_usuario', function($table) {
        //     $table->foreign('LOGIN_ID')->references('id')->on('users')->constrained()->onDelete('cascade');
        // });


        DB::statement ( 'ALTER TABLE p_usuario CHANGE NUM_IDENTIFICACION NUM_IDENTIFICACION INT(10) UNSIGNED ZEROFILL NOT NULL' );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('p_usuario');
    }
}
