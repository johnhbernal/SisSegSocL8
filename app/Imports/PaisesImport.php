<?php

namespace App\Imports;

use App\Models\Pais;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class PaisesImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {


        return new Pais([

            'CODIGO_PAIS' => $row['CODIGO_PAIS'],
            'NOMBRE' => $row['NOMBRE'],
            'ISO' => $row['ISO'],
            'CODIGO_TELEFONICO' => $row['CODIGO_TELEFONICO'],
            'created_by' => 'admin',
            'deleted_at' => '',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
