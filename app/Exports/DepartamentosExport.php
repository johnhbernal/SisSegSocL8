<?php

namespace App\Exports;


use App\Models\Departamento;
use Maatwebsite\Excel\Concerns\FromCollection;


class DepartamentosExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {

        return  $Departamentos = Departamento::select('CODIGO_MUNICIPIO', 'CODIGO_DEPARTAMENTO', 'NOMBRE', 'REGION', 'created_by')->orderBy('updated_at', 'DESC')->get();
    }
}
