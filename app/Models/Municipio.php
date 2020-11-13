<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; //línea necesaria

class Municipio extends Model
{
    use HasFactory;
    public $table = "p_municipio";

    use SoftDeletes; //Implementamos

    protected $dates = ['deleted_at']; //Registramos la nueva columna

    protected $primaryKey = 'CODIGO_MUNICIPIO';
    protected $fillable = ['CODIGO_MUNICIPIO', 'CODIGO_DEPARTAMENTO', 'NOMBRE', 'REGION'];

    public function Departamento()
    {
        return $this->belongsTo('App\Municipio')->withPivot('CODIGO_DEPARTAMENTO', 'status');
        // return $this->hasMany(Departamento::class);
    }
}
