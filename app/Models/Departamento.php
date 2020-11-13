<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; //línea necesaria

class Departamento extends Model
{
    use HasFactory;
    public $table = "p_departamento";
    protected $primaryKey = 'CODIGO_DEPARTAMENTO';

    use SoftDeletes; //Implementamos

    protected $dates = ['deleted_at']; //Registramos la nueva columna

    protected $fillable = ['CODIGO_DEPARTAMENTO', 'CODIGO_PAIS', 'NOMBRE'];
    public function Pais()
    {
        return $this->belongsTo('App\Departamento')->withPivot('CODIGO_PAIS', 'status');
        // 		return $this->hasMany(Departamento::class);
    }
    public function Departamento()
    {
        return $this->hasMany(Departamento::class);
        // 		return $this->belongsTo('App\Pais')->withPivot('cons_pais','status');
    }
}
