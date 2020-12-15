<?php

namespace App\Imports;

use App\Models\Departamento;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class MunicipiosImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {


        return new Departamento([

            // 'CODIGO_DEPARTAMENTO' => $row['CODIGO_DEPARTAMENTO'],
            'CODIGO_DEPARTAMENTO' => $row[1],
            'CODIGO_PAIS' => $row['CODIGO_PAIS'],
            'NOMBRE' => $row['NOMBRE'],
            'created_by' => 'admin',
            'deleted_at' => '',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

        ]);
    }
}
