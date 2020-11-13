<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; //línea necesaria

class Pais extends Model
{
    use HasFactory;
    public $table = "p_pais";


    use SoftDeletes; //Implementamos

    protected $dates = ['deleted_at']; //Registramos la nueva columna

    protected $primaryKey = 'CODIGO_PAIS';

    protected $fillable = ['CODIGO_PAIS', 'NOMBRE', 'ISO', 'CODIGO_TELEFONICO'];

    public function Pais()
    {
        return $this->hasMany(Pais::class);
    }
}
