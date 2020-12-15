<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Exports\MunicipiosExport;

use App\Imports\MunicipiosImport;

use Maatwebsite\Excel\Facades\Excel;


use App\Models\Municipio;
use Illuminate\Routing\Controller;

class ExcelCSVController extends Controller
{
    //

    /**
     * @return \Illuminate\Support\Collection
     */
    public function index()
    {
        return view('CSV\excel-csv-import');
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function importExcelCSV(Request $request)
    {
        $validatedData = $request->validate([

            'file' => 'required',

        ]);



        return $request;


        Excel::import(new MunicipiosImport, $request->file('file'));


        return redirect('excel-csv-file')->with('status', 'The file has been excel/csv imported to database in laravel 8');
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function exportExcelCSV($slug)
    {
        return Excel::download(new MunicipiosExport, 'Municipios.' . $slug);
    }
}
