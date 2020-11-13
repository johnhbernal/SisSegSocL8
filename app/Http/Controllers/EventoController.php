<?php

namespace App\Http\Controllers;

use App\Models\Eventos;
use DateTime;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;



class EventoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        // return 'llegue a calendario';

        return view('/timeManagement/calendar');
    }

    //funcion que consulta todo los datos y los devuelve en formato json
    public function get_event_data(Request $request)
    {

        try {
            $eventos = Eventos::all();

            // $eventos = Eventos::latest()()->orderBy('id', 'DESC');

            foreach ($eventos as $row) {

                $data[] = array(
                    'id'   => $row["id"],
                    'title'   => $row["TITULO"],
                    'descrption' =>  $row["DESCRIPCION"],
                    'start'   => $row["INICIO"],
                    'end'   => $row["FIN"],
                    'allDay' => 'false',
                    'backgroundColor' => $row["COLOR_TEXTO"],
                    'borderColor' =>  $row["COLOR_FONDO"]
                );
            }

            echo json_encode($data, Response::HTTP_OK);
        } catch (\Throwable $th) {
            return response()->json(
                [
                    'success' => False,
                    'message' => 'Error al momento de redirecionar a eventos con error ' + $th
                ]
            );
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //funcion utilizada para crear un nuevo item de pais
    public function Store(Request $request)
    {

        $validator = $this->validacionEvento($request);

        if ($validator->fails()) {

            $errors = $validator->errors();

            return response()->json(['success' => false, 'error' => 1, 'error_msg' => $errors->first()], 200);
        } else {

            $data = [
                'TITULO' => $request->title,
                'DESCRIPCION' => $request->descrption,
                // 'INICIO' => $request->start,
                // 'FIN' => $request->end,
                'INICIO' => substr($request->reservationtime, -48, 19),
                'FIN' => substr($request->reservationtime, -22, 19),
                // 'FIN' => substr($porciones[1], -19, 19),
                'COLOR_TEXTO' => $request->borderColor,
                'COLOR_FONDO' => $request->backgroundColor,
            ];

            try {
                Eventos::create($data);
                return response()->json(
                    [
                        'success' => true,
                        'message' => 'El Evento fue creado con éxito.'
                    ]
                );
            } catch (\Throwable $th) {
                //throw $th;
                return response()->json(
                    [
                        'success' => False,
                        'message' => 'Error al momento de actualizar el evento con error ' + $th
                    ]
                );
            }
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pais  $pais
     * @return \Illuminate\Http\Response
     */
    //Funcion utilizada para redirigir los datos para actualizar un pais
    public function update($id)
    {

        try {
            $event  = Eventos::find($id);

            return response()->json([
                'data' => $event
            ]);
        } catch (\Throwable $th) {

            return response()->json([
                'success' => false,
                'message' => 'Error al moemnto de redireccionar ' + $th
            ]);
        }
    }

    //Funcion utilizada para crear la validacion y el actualizacion de un pais.
    public function updateEvent(Request $request)
    {

        $validator = $this->validacionEvento($request);

        if ($validator->fails()) {

            $errors = $validator->errors();

            return response()->json(['success' => false, 'error de validacion ' => 1, 'error_msg' => $errors->first()], 200);
        } else {

            try {
                $event = Eventos::find($request->id);

                // $pais->CODIGO_PAIS = $request->id;
                // $pais->NOMBRE = $request->name;
                // $pais->ISO = $request->iso;
                // $pais->CODIGO_TELEFONICO = $request->phone_code;

                if ($event->save()) {

                    return response()->json(
                        [
                            'success' => true,
                            'message' => 'La actualización del evento fue realizada con éxito.'
                        ]
                    );
                } else {
                    return response()->json(
                        [
                            'success' => false,
                            'message' => 'Error al realizar la actualización del evento.'
                        ]
                    );
                }
            } catch (\Throwable $th) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error en el catch al momento de actualizar el país.'
                ]);
            }
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pais  $pais
     * @return \Illuminate\Http\Response
     */
    //Funcion utiñizada para realizar la eliminacion de un item de pais
    public function destroy($id)
    {

        try {
            $event = Eventos::find($id);

            $event->delete();

            return response()->json([
                'message' => 'El evento fue eliminado con éxito.'
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'Error al eliminar el evento de id ' + $th
            ]);
        }
    }

    // ******************************************************************
    //Funcion utilizada para validar tanto al momento de crear un nuevo item de pais o al momento de actualizar
    public function validacionEvento(Request $request)
    {

        $event = Eventos::find($request->id);

        if ($event != null) {

            $rules = [

                'title' => 'required|min:002|max:150',
                'descrption' => 'required|min:002|max:150',
                'backgroundColor' => 'required|min:002|max:150',
                'borderColor' => 'required|min:002|max:150',
                'reservationtime' => 'nullable|date',
                'start' => 'nullable|date',
                'end' => 'nullable|date',

            ];

            $customMessages = [

                'title.required' => 'El campo TITULO es requerido.',
                'title.min' => 'El campo TITULO solo puede tener un minimo de 2 caracteres.',
                'title.max' => 'El campo TITULO solo puede tener un maxino de 150 caracteres.',

                'descrption.required' => 'El campo DESCRIPCION es requerido.',
                'descrption.min' => 'El campo DESCRIPCION solo puede tener un minimo de 2 caracteres.',
                'descrption.max' => 'El campo DESCRIPCION solo puede tener un maxino de 150 caracteres.',

                'backgroundColor.required' => 'El campo COLOR DE FONDO es requerido.',
                'backgroundColor.min' => 'El campo COLOR DE FONDO solo puede tener un minimo de 2 caracteres.',
                'backgroundColor.max' => 'El campo COLOR DE FONDO solo puede tener un maxino de 150 caracteres.',

                'borderColor.required' => 'El campo COLOR DE TEXTO es requerido.',
                'borderColor.min' => 'El campo COLOR DE TEXTO solo puede tener un minimo de 2 caracteres.',
                'borderColor.max' => 'El campo COLOR DE TEXTO solo puede tener un maxino de 150 caracteres.',

                'reservationtime.date' => 'El campo RANGO DE TIEMPO DE RESERVACION debe ser de tipo fecha.',
                'reservationtime.required' => 'El campo RANGO DE TIEMPO DE RESERVACION es requerido.',
                'reservationtime.min' => 'El campo RANGO DE TIEMPO DE RESERVACION solo puede tener un minimo de 2 caracteres.',
                'reservationtime.max' => 'El campo RANGO DE TIEMPO DE RESERVACION solo puede tener un maxino de 150 caracteres.',

                'start.date' => 'El campo INICIO debe ser de tipo fecha.',
                'start.required' => 'El campo INICIO es requerido.',
                'start.min' => 'El campo INICIO solo puede tener un minimo de 2 caracteres.',
                'start.max' => 'El campo INICIO solo puede tener un maxino de 150 caracteres.',

                'end.date' => 'El campo FINAL debe ser de tipo fecha.',
                'end.required' => 'El campo FINAL es requerido.',
                'end.min' => 'El campo FINAL solo puede tener un minimo de 2 caracteres.',
                'end.max' => 'El campo FINAL solo puede tener un maxino de 150 caracteres.',


            ];
            $validator = Validator::make($request->all(), $rules, $customMessages);

            return $validator;
        } else {

            $rules = [

                // 'id' => 'required|numeric|min:001|max:999|unique:eventos,id',
                'title' => 'required|alpha_dash|min:002|max:150',
                // 'descrption' => 'required|regex:/^[\pL\s\-]+$/u|min:002|max:150',
                'descrption' => 'required|min:002|max:150',
                'backgroundColor' => 'required|min:002|max:150',
                'borderColor' => 'required|min:002|max:150',
                // 'reservationtime' => 'nullable|date',
                'start' => 'nullable|date',
                'end' => 'nullable|date',
            ];

            $customMessages = [

                'title.required' => 'El campo TITULO es requerido.',
                'title.min' => 'El campo TITULO solo puede tener un minimo de 2 caracteres.',
                'title.max' => 'El campo TITULO solo puede tener un maxino de 150 caracteres.',

                'descrption.required' => 'El campo DESCRIPCION es requerido.',
                'descrption.min' => 'El campo DESCRIPCION solo puede tener un minimo de 2 caracteres.',
                'descrption.max' => 'El campo DESCRIPCION solo puede tener un maxino de 150 caracteres.',

                'backgroundColor.required' => 'El campo COLOR DE FONDO es requerido.',
                'backgroundColor.min' => 'El campo COLOR DE FONDO solo puede tener un minimo de 2 caracteres.',
                'backgroundColor.max' => 'El campo COLOR DE FONDO solo puede tener un maxino de 150 caracteres.',

                'borderColor.required' => 'El campo COLOR DE TEXTO es requerido.',
                'borderColor.min' => 'El campo COLOR DE TEXTO solo puede tener un minimo de 2 caracteres.',
                'borderColor.max' => 'El campo COLOR DE TEXTO solo puede tener un maxino de 150 caracteres.',

                // 'reservationtime.date' => 'El campo RANGO DE TIEMPO DE RESERVACION debe ser de tipo fecha.',
                // 'reservationtime.required' => 'El campo RANGO DE TIEMPO DE RESERVACION es requerido.',
                // 'reservationtime.min' => 'El campo RANGO DE TIEMPO DE RESERVACION no debe ser nulo.',

                'start.date' => 'El campo INICIO debe ser de tipo fecha.',
                'start.required' => 'El campo INICIO es requerido.',
                'start.nullable' => 'El campo INICIO no debe ser nulo.',

                'end.date' => 'El campo FINAL debe ser de tipo fecha.',
                'end.required' => 'El campo FINAL es requerido.',
                'end.nullable' => 'El campo FINAL no debe ser nulo.',


            ];

            $validator = Validator::make($request->all(), $rules, $customMessages);

            return $validator;
        }
    }
}
