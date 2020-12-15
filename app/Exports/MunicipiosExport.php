<?php

namespace App\Exports;

// use App\Models\Departamento;
use App\Models\Pais;
use Maatwebsite\Excel\Concerns\FromCollection;



class MunicipiosExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {

        // return  $Municipios = Municipio::select('CODIGO_MUNICIPIO', 'CODIGO_DEPARTAMENTO', 'NOMBRE', 'REGION', 'created_by')->orderBy('updated_at', 'DESC')->get();

        return  $Paises = Pais::select('CODIGO_PAIS', 'NOMBRE', 'ISO','CODIGO_TELEFONICO', 'created_by')->orderBy('updated_at', 'DESC')->get();

        // return  Departamento::select('CODIGO_DEPARTAMENTO', 'CODIGO_PAIS', 'NOMBRE', 'created_by')->orderBy('updated_at', 'DESC')->get();
    }
}
