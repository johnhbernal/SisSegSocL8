<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; //línea necesaria

class Eventos extends Model
{
    use HasFactory;
    public $table = "eventos";

    use SoftDeletes; //Implementamos

    protected $dates = ['deleted_at']; //Registramos la nueva columna

    protected $primaryKey = 'id';
    protected $fillable = ['id', 'TITULO', 'DESCRIPCION', 'INICIO', 'FIN', 'COLOR_TEXTO', 'COLOR_FONDO'];
}
