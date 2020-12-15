<?php

namespace App\Exports;


use App\Models\Pais;
use Maatwebsite\Excel\Concerns\FromCollection;


class PaisesExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {


        return  $Paises = Pais::select('CODIGO_PAIS', 'NOMBRE', 'ISO', 'CODIGO_TELEFONICO', 'created_by')->orderBy('updated_at', 'DESC')->get();
    }
}
