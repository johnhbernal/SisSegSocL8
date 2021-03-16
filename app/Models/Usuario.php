<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; //línea necesaria
use Spatie\Permission\Traits\HasRoles;


class Usuario extends Model
{
    use HasRoles;
    use HasFactory;

    public $table = "p_usuario";
         public $primarykey = 'CONS_USUARIO';

         use SoftDeletes; //Implementamos

         protected $dates = ['deleted_at']; //Registramos la nueva columna

        protected $fillable = [
     			'CONS_USUARIO',
    // 			'id',
                'NUM_IDENTIFICACION',
    // 			'LOGIN_ID',
                'TIPO_DOCUMENTO',
                'PRIMER_NOMBRE',
                'PRIMER_APELLIDO',
                'FECHA_DE_NACIMIENTO',
                'ESTADO',
                'SEXO',
                'GRUPO_SANGUINEO',
                'FACTOR_RH',
                'ESTADO_CIVIL',
                'VINCULO_LABORAL',
                'DISCAPACIDAD',
                'TIPO_DISCAPACIDAD',
                'CONDICION_DISCAPACIDAD',
                'ETNIA'
                // 'created_by',
                // 'created_at'
        ];

        public function Usuario() {
            return $this->hasMany ( Usuario::class );
        }
}
