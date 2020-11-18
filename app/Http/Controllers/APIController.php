<?php

namespace App\Http\Controllers;



use Illuminate\Routing\Controller;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Http;

class APIController extends Controller
{

    public function index()
    {

        return view('/webAPIS/showDivisas');
    }
    //funcion que consulta todo los datos y los devuelve en formato json
    public function get_WebAPI_data(Request $request)
    {

        try {
            // $eventos = Eventos::all();

            // // $eventos = Eventos::latest()()->orderBy('id', 'DESC');

            $eventos = Http::get('https://mindicador.cl/api');


            return $eventos->json();


            // foreach ($eventos as $row) {


            //     foreach ($row["dolar"] as $row2) {
            //         // return $row2["codigo"];

            //         $data[] = array(
            //             'id'   => $row["dolar"]["codigo"],
            //             'nombre'   => $row["dolar"]["nombre"],
            //             'unidad_medida' => $row["dolar"]["unidad_medida"],
            //             'fecha'   => $row["dolar"]["fecha"],
            //             'valor'   => $row["dolar"]["valor"],

            //         );
            //     }


            // }


            // $data[] =array(
            //     'prueba'=>'Datos de prueba',
            // );

            // $data= Http::get('https://mindicador.cl/api');


            // return($data['fecha']);
            // return false;

            //  $data->json();

            echo json_encode($eventos, Response::HTTP_OK);
        } catch (\Throwable $th) {
            return response()->json(
                [
                    'success' => False,
                    'message' => 'Error al momento de redirecionar a eventos con error '
                ]
            );
        }
    }
}
