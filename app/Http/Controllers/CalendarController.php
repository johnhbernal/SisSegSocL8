<?php

namespace App\Http\Controllers;

use App\Calendar;
// use Request;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Routing\Controller;

class CalendarController extends Controller
{


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     */
    // public function index()
    // {
    //     $calendar = Calendar::all();
    //     return view('calendar')->with(compact('calendar'));
    // }

    /**
     * Store a newly created resource in storage.
     *
     */
    // public function store(Request $request)
    // {
    //     $data = $request->validate([
    //         // 'codigo' => 'required',
    //         // 'titulo' => 'required|max:255',
    //         // 'descripcion' => 'required',
    //         // 'inicio' => 'required|date|before:today|after:today',
    //         // 'fin' => 'required|date|after:inicio',
    //         // 'colortexto' => 'required|max:7',
    //         // 'colorfondo' => 'required|max:7'

    //         'titulo' => 'max:255',
    //         'descripcion' => '',
    //         'inicio' => '',
    //         'fin' => '',
    //         'colortexto' => '',
    //         'colorfondo' => ''

    //     ]);

    //     $calendar = Calendar::create($data);

    //     return Response::json($calendar);
    // }


    // public function index()
    // {
    //     if (request()->ajax()) {

    //         //  $start = (!empty($_GET["inicio"])) ? ($_GET["inicio"]) : ('');
    //         //  $end = (!empty($_GET["fin"])) ? ($_GET["fin"]) : ('');

    //         //  $data = Calendar::whereDate('inicio', '>=', $start)->whereDate('fin',   '<=', $end)->

    //         //  get(['codigo','titulo','descripcion', 'inicio','fin','colortexto','colorfondo']);

    //         $data = Calendar::all();

    //         return Response::json($data);
    //     }

    //     return view('calendar');
    // }


    // public function getCalendario()
    // {
    //     if (request()->ajax()) {

    //         //  $start = (!empty($_GET["inicio"])) ? ($_GET["inicio"]) : ('');
    //         //  $end = (!empty($_GET["fin"])) ? ($_GET["fin"]) : ('');

    //         //  $data = Calendar::whereDate('inicio', '>=', $start)->whereDate('fin',   '<=', $end)->

    //         //  get(['codigo','titulo','descripcion', 'inicio','fin','colortexto','colorfondo']);

    //         $data = Calendar::all();

    //         return Response::json($data);
    //     }


    //     return view('calendar')->with(compact('calendar'))->with($arregloImpacto = array(
    //         'mensaje' => "La Complejidad con que intentas eliminar no existe."
    //     ));
    // }


    // public function create(Request $request)
    // {
    //     $insertArr = [
    //         //    'codigo'=> $request->title,
    //         'titulo' => $request->titulo,
    //         'descripcion' => $request->descripcion,
    //         'inicio' => $request->inicio,
    //         'fin' => $request->fin,
    //         'colortexto' => $request->colortexto,
    //         'colorfondo' => $request->colorfondo


    //     ];
    //     $event = Calendar::insert($insertArr);
    //     return Response::json($event);
    // }


    // public function update(Request $request)
    // {
    //     $where = array('codigo' => $request->codigo);
    //     $updateArr =
    //         [
    //             'titulo' => $request->titulo,
    //             'descripcion' => $request->descripcion,
    //             'inicio' => $request->inicio,
    //             'fin' => $request->fin,
    //             'colortexto' => $request->colortexto,
    //             'colorfondo' => $request->colorfondo
    //         ];

    //     $event  = Calendar::where($where)->update($updateArr);

    //     return Response::json($event);
    // }


    // public function destroy(Request $request)
    // {
    //     $event = Calendar::where('codigo', $request->codigo)->delete();

    //     return Response::json($event);
    // }



    // ****************************************************************

    public function index()
    {
        // return view('company.index');
        return view('calendar');
    }

    public function get_event_data(Request $request)
    {
        // $eventos = Calendar::latest()->paginate(5);
        $eventos = Calendar::all();



        // $eventos = Calendar::latest()()->orderBy('codigo', 'DESC');
        // return Request::ajax();
        // echo '<pre>';
        // var_dump($eventos);
        // echo '</pre>';


        // return Request::ajax() ?
        //     response()->json($eventos, Response::HTTP_OK)
        //     : abort(404);




        foreach ($eventos as $row) {


            // echo '<pre>';
            // var_dump($row);
            // echo '</pre>';

            //     'title' = value.titulo,
            //     'start' = value.inicio,
            //     'end' = value.fin,
            //     'allDay' = false,
            //     'backgroundColor' = 'value.colorfondo',
            //     'borderColor' = 'value.colortexto'



            $data[] = array(
                'id'   => $row["codigo"],
                'title'   => $row["titulo"],
                'start'   => $row["inicio"],
                'end'   => $row["fin"],
                'allDay' => 'false',
                'backgroundColor' => $row["colorfondo"],
                'borderColor' =>  $row["colortexto"],
                'descrption' =>  $row["descripcion"]



            );
        }

        echo json_encode($data, Response::HTTP_OK);

        //     return Request::ajax() ?
        // response()->json($data, Response::HTTP_OK)
        // : abort(404);



    }



    public function Store(Request $request)
    {
        // Calendar::updateOrCreate(
        //     [
        //         'id' => $request->codigo
        //     ],
        //     [
        //         'codigo' => $request->id,
        //         'titulo' => $request->title,
        //         'descripcion' => $request->description,
        //         'inicio' => $request->start,
        //         'fin' => $request->end,
        //         'colortexto' => $request->borderColor,
        //         'colorfondo' => $request->backgroundColor,
        //     ]
        // );

        // return response()->json(
        //     [
        //         'success' => true,
        //         'message' => 'Data inserted successfully'
        //     ]
        // );

        // var_dump($request);

        $data = [

            // 'codigo' => 'required',
            // 'titulo' => 'required|max:255',
            // 'descripcion' => 'required',
            // 'inicio' => 'required|date|before:today|after:today',
            // 'fin' => 'required|date|after:inicio',
            // 'colortexto' => 'required|max:7',
            // 'colorfondo' => 'required|max:7'

            // 'titulo' => $request->title,
            // 'descripcion' => $request->description,
            // 'inicio' => $request->start,
            // 'fin' => $request->end,
            // 'descripcion' => $request->borderColor,
            // 'colorfondo' => $request->backgroundColor,


                //  $data = $request->validate([
                //     'codigo' => 'required',
                //     'titulo' => 'required|max:255',
                //     'descripcion' => 'required',
                //     'inicio' => 'required|date|before:today|after:today',
                //     'fin' => 'required|date|after:inicio',
                //     'colortexto' => 'required|max:7',
                //     'colorfondo' => 'required|max:7'
                // ]);


            'titulo' => $request->title,
            'descripcion' => $request->description,
            'inicio' => $request->start,
            'fin' => $request->end,
            'colortexto' => $request->borderColor,
            'colorfondo' => $request->backgroundColor,

        ];

        $calendar = Calendar::create($data);

        // return Response::json($calendar);
        return response()->json(
            [
                'success' => true,
                'message' => 'Data inserted successfully'
            ]
        );
    }

    public function update($id)
    {
        $event  = Calendar::find($id);

        return response()->json([
            'data' => $event
        ]);
    }

    public function destroy($id)
    {
        $event = Calendar::find($id);

        $event->delete();

        return response()->json([
            'message' => 'Data deleted successfully!'
        ]);
    }


    // ******************************************************************
}
