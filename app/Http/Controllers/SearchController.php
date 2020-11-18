<?php

namespace App\Http\Controllers;


// use App\Http\Controllers\Response;

use App\Calendar as AppCalendar;
use Illuminate\Http\Response;
use App\Models\Departamento;
use Illuminate\Http\Request;
use App\Models\Pais;
use App\Models\Enum;
use Illuminate\Routing\Controller;


class SearchController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // public function index()
    // {
    //     // return view('home');
    //     return view('home');
    // }



    /**
     *
     * @author <a href="mailto:johnh.bernal@premize.com">John Hawer Bernal Gonzalez;
     * @since 11/03/2015
     * @return el nombre y el id del proyecto
     *         Esta funcion es ejecutada por un ajax de autocompletar despues del tercer caracter de busqueda por proyecto
     */
    public function getCalendar()
    {

        // $proyecto = Input::get ( 'filtroProyecto' );
        // $proyecto = strtolower ( $proyecto );
        // $login = Input::get ( 'login' );
        // $rol = Input::get ( 'rol' );
        $results = array();

        // if ($rol == Config::get ( 'RolesEnumConfig.CLIENTE' )) {

        // 	$queries = DB::table ( 'pqr_p_proyecto' )->join ( 'pqr_p_usuario_proyecto', 'pqr_p_proyecto.cod_proyecto', '=', 'pqr_p_usuario_proyecto.cod_proyecto' )->whereRaw ( 'lower(pqr_p_proyecto.nombre) LIKE ?', array (
        // 			'%' . $proyecto . '%'
        // 	) )->where ( 'pqr_p_usuario_proyecto.login', '=', $login )->select ( "pqr_p_proyecto.nombre as nombreProyecto", "pqr_p_proyecto.cod_proyecto as consProyecto" )->take ( 5 )->get ();

        // 	foreach ( $queries as $query ) {
        // 		$results [] = [
        // 				'id' => $query->consProyecto,
        // 				'value' => $query->nombreProyecto
        // 		];
        // 	}
        // } elseif ($rol == Config::get ( 'RolesEnumConfig.REPRESENTANTE' )) {

        // 	$queries = DB::table ( 'pqr_p_proyecto' )->join ( 'pqr_p_usuario_proyecto', 'pqr_p_proyecto.cod_proyecto', '=', 'pqr_p_usuario_proyecto.cod_proyecto' )->whereRaw ( 'lower(pqr_p_proyecto.nombre) LIKE ?', array (
        // 			'%' . $proyecto . '%'
        // 	) )->select ( "pqr_p_proyecto.nombre as nombreProyecto", "pqr_p_proyecto.cod_proyecto as consProyecto" )->take ( 5 )->get ();

        // 	foreach ( $queries as $query ) {
        // 		$results [] = [
        // 				'id' => $query->consProyecto,
        // 				'value' => $query->nombreProyecto
        // 		];
        // 	}
        // } else {
        // 	return 'Usted no tiene el rol adecuado para realizar esta consulta';
        // }


        $data = AppCalendar::all();

        // 'codigo', 'titulo', 'descripcion', 'inicio', 'fin', 'colortexto', 'colorfondo'

        foreach ($data as $query) {
            $results[] = [
                'id' => $query->codigo,
                'value' => $query->titulo
            ];
        }

        return Response::json($results);
    }

    // funcion utilizada para consultar todos los paises para mostrarlos en un select.
    public function get_Paises(Request $request)
    {
        try {

            $results = array();

            $data = Pais::all();

            foreach ($data as $query) {

                $results[] = [
                    'id' => $query->CODIGO_PAIS,
                    'value' => $query->NOMBRE
                ];
            }

            echo json_encode($data, Response::HTTP_OK);
        } catch (\Throwable $th) {
            return response()->json(
                [
                    'success' => False,
                    'message' => 'Error al momento de consultar los paises para rellenar el select de paises ' + $th
                ]
            );
        }
    }

    // funcion utilizada para consultar todos los departamentos para mostrarlos en un select.
    public function get_Cities(Request $request)
    {
        try {

            $results = array();

            $data = Departamento::all();

            foreach ($data as $query) {

                $results[] = [
                    'id' => $query->CODIGO_DEPARTAMENTO,
                    'value' => $query->NOMBRE
                ];
            }

            echo json_encode($data, Response::HTTP_OK);
        } catch (\Throwable $th) {
            return response()->json(
                [
                    'success' => False,
                    'message' => 'Error al momento de consultar los departamentos para rellenar el select de municipios ' + $th
                ]
            );
        }
    }

    // funcion utilizada para consultar todos los tipos de Id para mostrarlos en un select.
    public function get_Type_Id(Request $request)
    {
        try {

            $data = Enum::typeID();

            echo json_encode($data, Response::HTTP_OK);
        } catch (\Throwable $th) {
            return response()->json(
                [
                    'success' => False,
                    'message' => 'Error al momento de consultar los tipos de identificacion para rellenar el select de usuarios '
                ]
            );
        }
    }


    // funcion utilizada para consultar todos los tipos de estados para mostrarlos en un select.
    public function get_State(Request $request)
    {
        try {

            $data = Enum::typeState();

            echo json_encode($data, Response::HTTP_OK);
        } catch (\Throwable $th) {
            return response()->json(
                [
                    'success' => False,
                    'message' => 'Error al momento de consultar los estados para rellenar el select de usuarios '
                ]
            );
        }
    }

    // funcion utilizada para consultar todos los tipos de sexo para mostrarlos en un select.
    public function get_Sex(Request $request)
    {
        try {

            $data = Enum::typeSex();

            echo json_encode($data, Response::HTTP_OK);
        } catch (\Throwable $th) {
            return response()->json(
                [
                    'success' => False,
                    'message' => 'Error al momento de consultar los tipos de sexo para rellenar el select de usuarios '
                ]
            );
        }
    }

    // funcion utilizada para consultar todos los tipos de sangre para mostrarlos en un select.
    public function get_Blood_Type(Request $request)
    {
        try {

            $data = Enum::typeBloodType();

            echo json_encode($data, Response::HTTP_OK);
        } catch (\Throwable $th) {
            return response()->json(
                [
                    'success' => False,
                    'message' => 'Error al momento de consultar los tipos de sangre para rellenar el select de usuarios '
                ]
            );
        }
    }

    // funcion utilizada para consultar todos los factores de sangre para mostrarlos en un select.
    public function get_Factor_Type(Request $request)
    {
        try {

            $data = Enum::typeFactorType();

            echo json_encode($data, Response::HTTP_OK);
        } catch (\Throwable $th) {
            return response()->json(
                [
                    'success' => False,
                    'message' => 'Error al momento de consultar los factores de sangre para rellenar el select de usuarios '
                ]
            );
        }
    }

    // funcion utilizada para consultar todos los estados civiles para mostrarlos en un select.
    public function get_Civil_Status(Request $request)
    {
        try {

            $data = Enum::typeCivilStatus();

            echo json_encode($data, Response::HTTP_OK);
        } catch (\Throwable $th) {
            return response()->json(
                [
                    'success' => False,
                    'message' => 'Error al momento de consultar los estados civiles para rellenar el select de usuarios '
                ]
            );
        }
    }

    // funcion utilizada para consultar todas las relaciones laborales para mostrarlos en un select.
    public function get_Work_Related(Request $request)
    {
        try {

            $data = Enum::typeWorkRelated();

            echo json_encode($data, Response::HTTP_OK);
        } catch (\Throwable $th) {
            return response()->json(
                [
                    'success' => False,
                    'message' => 'Error al momento de consultar todas las relaciones laborales para rellenar el select de usuarios '
                ]
            );
        }
    }

    // funcion utilizada para consultar las incapacidades para mostrarlos en un select.
    public function get_Impairment(Request $request)
    {
        try {

            $data = Enum::impairment();

            echo json_encode($data, Response::HTTP_OK);
        } catch (\Throwable $th) {
            return response()->json(
                [
                    'success' => False,
                    'message' => 'Error al momento de consultar las incapacidades para rellenar el select de usuarios '
                ]
            );
        }
    }

    // funcion utilizada para consultar los tipos de incapacidades para mostrarlos en un select.
    public function get_Type_Impairment(Request $request)
    {
        try {

            $data = Enum::TypeImpairment();

            echo json_encode($data, Response::HTTP_OK);
        } catch (\Throwable $th) {
            return response()->json(
                [
                    'success' => False,
                    'message' => 'Error al momento de consultar los tipos de incapacidades para rellenar el select de usuarios '
                ]
            );
        }
    }

    // funcion utilizada para consultar los grupos etnicos para mostrarlos en un select.
    public function get_Ethnic_Group(Request $request)
    {
        try {

            $data = Enum::TypeEthnicGroup();

            echo json_encode($data, Response::HTTP_OK);
        } catch (\Throwable $th) {
            return response()->json(
                [
                    'success' => False,
                    'message' => 'Error al momento de consultar los grupos etnicos para rellenar el select de usuarios '
                ]
            );
        }
    }

}
